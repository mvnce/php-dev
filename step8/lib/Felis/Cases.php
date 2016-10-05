<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/27/16
 * Time: 21:16
 */

namespace Felis;


class Cases extends Table {
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "clientcase");
    }

    /**
     * Get a case by id
     * @param $id The case by ID
     * @returns Object that represents the case if successful, null otherwise.
     */
    public function get($id) {
        $users = new Users($this->site);
        $usersTable = $users->getTableName();

        $sql = <<<SQL
SELECT c.id, c.client, client.name as clientName,
       c.agent, agent.name as agentName,
       number, summary, status
from $this->tableName c,
     $usersTable client,
     $usersTable agent
where c.client = client.id and
      c.agent=agent.id and
      c.id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return null;
        }

        return new ClientCase($statement->fetch(\PDO::FETCH_ASSOC));
    }

    public function insert($client, $agent, $number) {
        $sql = <<<SQL
insert into $this->tableName(client, agent, number, summary, status)
values(?, ?, ?, "", "")
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            if($statement->execute(array($client, $agent, $number)) === false) {
                return null;
            }
        } catch(\PDOException $e) {
            return null;
        }

        return $pdo->lastInsertId();
    }

    public function getCases() {
        $users = new Users($this->site);
        $usersTable = $users->getTableName();

        $sql = <<<SQL
SELECT c.id, c.client, client.name as clientName,
       c.agent, agent.name as agentName,
       number, summary, status
FROM $this->tableName c
INNER JOIN $usersTable client
ON c.client = client.id
INNER JOIN $usersTable agent
ON c.agent=agent.id
ORDER BY status DESC, number ASC;
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array());
        if($statement->rowCount() === 0) {
            return null;
        }

        $stat = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $ret_arr = array();

        foreach ($stat as $item) {
            array_push($ret_arr, new ClientCase($item));
        }

        return $ret_arr;
    }

    public function update($number, $summary, $agent, $status, $id) {

        $sql =<<<SQL
UPDATE $this->tableName
SET number=?, summary=?, agent=?, status=?
WHERE id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            $ret = $statement->execute(array($number, $summary, $agent, $status, $id));
            if ($statement->rowCount() === 0) {
                return false;
            }
        } catch(\PDOException $e) {
            // do something when the exception occurs...
            return false;
        }
        return $ret;
    }

    public function delete($id) {

        $sql =<<<SQL
DELETE FROM $this->tableName
WHERE id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            $ret = $statement->execute(array($id));
            if ($statement->rowCount() === 0) {
                return false;
            }
        } catch(\PDOException $e) {
            // do something when the exception occurs...
            return false;
        }
        return $ret;
    }

}