<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/25/16
 * Time: 22:25
 */

namespace Noir;


class Cookies extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "cookie");
    }

    public static function randomSalt($len = 16) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789`~!@#$%^&*()-=_+';
        $l = strlen($chars) - 1;
        $str = '';
        for ($i = 0; $i < $len; ++$i) {
            $str .= $chars[rand(0, $l)];
        }
        return $str;
    }

    /**
     * Create a new cookie token
     * @param $user User to create token for
     * @return New 32 character random string
     */
    public function create($user) {
        $salt = $this->randomSalt();
        $token = $this->randomSalt(32);
        $hash = hash("sha256", $token . $salt);

        $sql = <<<SQL
INSERT INTO $this->tableName
VALUES(?, ?, ?, ?);
SQL;

        $statement = $this->pdo()->prepare($sql);
        $result = $statement->execute(array($user, $salt, $hash, date("Y-m-d H:i:s")));

        return ($result === false? false : $token);
    }

    /**
     * Validate a cookie token
     * @param $user User ID
     * @param $token Token
     * @return null|string If successful, return the actual
     *   hash as stored in the database.
     */
    public function validate($user, $token) {
        $sql = <<<SQL
SELECT * FROM $this->tableName
WHERE user=?;
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($user));

        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach($rows as $row) {
            $hash = $row['hash'];
            $salt = $row['salt'];

            if($hash === hash("sha256", $token . $salt)) {
                return $hash;
            }
        }
        return null;
    }

    /**
     * Delete a hash from the database
     * @param $hash Hash to delete
     * @return bool True if successful
     */
    public function delete($hash) {
        $sql =<<<SQL
DELETE FROM $this->tableName
WHERE hash=?;
SQL;
        $statement = $this->pdo()->prepare($sql);
        $result = $statement->execute(array($hash));
        return $result;
    }
}
