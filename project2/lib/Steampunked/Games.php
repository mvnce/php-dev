<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 4/12/2016
 * Time: 3:52 PM
 */

namespace Steampunked;


class Games extends Table
{
    public function __construct(Site $site) {
        parent::__construct($site, "game");
    }

    // get games for current player, it includes current player's id
    public function getGames($id) {
        $sql =<<<SQL
SELECT * FROM $this->tableName
WHERE userid1 = ? OR userid2 = ?
ORDER BY id
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($id, $id));
        if($statement->rowCount() === 0) {
            return null;
        }

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getOtherGames() {
        $sql =<<<SQL
SELECT * FROM $this->tableName
WHERE userid1 = ? OR userid2 = ?
ORDER BY id
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array('', ''));
        if($statement->rowCount() === 0) {
            return null;
        }

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    // add new game to player, leave another one blank
    public function add($id) {
        $sql = <<<SQL
INSERT INTO $this->tableName(userid1)
values(?)
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($id));
        $gameId = $this->pdo()->lastInsertId();

        return $gameId;
    }


    public function remove($gameId) {
        $sql = <<<SQL
DELETE FROM $this->tableName
WHERE id = ?
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($gameId));
    }

    public function updateTurn($gameId, $playerId) {
        $sql =<<<SQL
update $this->tableName set turn=?
where id=?
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($playerId, $gameId));
        return 123;
    }

    private $pdo = null; ///< The PDO object
}