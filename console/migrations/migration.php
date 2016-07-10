<?php
require 'PdoConfiguration.php';

$sql = <<<____SQL
CREATE TABLE IF NOT EXISTS user (
  id             INT(11)      NOT NULL,
  name            VARCHAR(40)  NOT NULL,
  lastname        VARCHAR(40)  NOT NULL,
  email           VARCHAR(40)  NOT NULL UNIQUE,
  username        VARCHAR(40)  NOT NULL UNIQUE,
  password        VARCHAR(128) NOT NULL,
  registered_time DATETIME     NOT NULL,
  last_login      DATETIME     NOT NULL,
  status          TINYINT(1)   NOT NULL,
  PRIMARY KEY (id)
)
  ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS messages (
  id           INT(11)    NOT NULL,
  sender_id    INT(11)    NOT NULL,
  getter_id    INT(11)    NOT NULL,
  sended_time  DATETIME   NOT NULL,
  viewed       TINYINT(1) NOT NULL,
  message_text TEXT,
  PRIMARY KEY (id),
  FOREIGN KEY (sender_id) REFERENCES user (id)
    ON UPDATE RESTRICT
    ON DELETE CASCADE,
  FOREIGN KEY (getter_id) REFERENCES user (id)
    ON UPDATE RESTRICT
    ON DELETE CASCADE
)
  ENGINE = InnoDB;
____SQL;

$fig = new PdoConfiguration();
$instance = $fig->getPdoInstance();
echo $sql;
$result = $instance->exec($sql);
echo $result;
?>