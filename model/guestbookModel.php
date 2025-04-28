<?php

function addGuestbook(
    PDO $db,
    string $firstname,
    string $lastname,
    string $usermail,
    string $phone,
    string $postcode,
    string $message
): bool {
    $firstname = trim(htmlspecialchars(strip_tags($firstname), ENT_QUOTES));
    $lastname = trim(htmlspecialchars(strip_tags($lastname), ENT_QUOTES));
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    $phone = trim(htmlspecialchars(strip_tags($phone), ENT_QUOTES));
    $postcode = trim(htmlspecialchars(strip_tags($postcode), ENT_QUOTES));
    $message = trim(htmlspecialchars(strip_tags($message), ENT_QUOTES));

    if (
        empty($firstname) || strlen($firstname) > 100 || empty($lastname) || strlen($lastname) > 100 || empty($usermail) || strlen($usermail) > 200 || empty($phone) || strlen($phone) > 20 ||
        ctype_digit($phone) === false || empty($postcode) || strlen($postcode) > 4 || empty($message) || strlen($message) > 500
    ) {
        return false;
    }

    $prepare = $db->prepare("
    INSERT INTO `guestbook` (`firstname`,`lastname`,`usermail`,`phone`,`postcode`,`message`)
    VALUES (?,?,?,?,?,?)
    ");
    try {
        $prepare->execute([$firstname, $lastname, $usermail, $phone, $postcode, $message]);
        return true;
    } catch (Exception $except) {
        die($except->getMessage());
    }
}

function getAllGuestbook(PDO $d_b): array
{
    $prepa = $d_b->prepare("
    SELECT * FROM `guestbook`
    ORDER BY `guestbook`.`datemessage` DESC
    ");
    try {

        $prepa->execute();

        $result = $prepa->fetchAll();
        $prepa->closeCursor();
        return $result;
    } catch (Exception $exc) {
        die($exc->getMessage());
    }
}

function getNbTotalGuestbook(PDO $Db): int
{
    $req = $Db->prepare("SELECT COUNT(*) as nb FROM guestbook ");
    try{
        $req->execute();
        $nb = $req->fetch()['nb'];
        $req->closeCursor();
        return $nb;
    }catch (Exception $e){
        die($e->getMessage());
    }
}

function getGuestbookPagination(PDO $dB, int $offset, int $limit): array
{
    $prep = $dB->prepare("
        SELECT * FROM `guestbook`
        ORDER BY `guestbook`.`datemessage` DESC
        LIMIT ?,?
        ");
    $prep->bindParam(1, $offset, PDO::PARAM_INT);
    $prep->bindParam(2, $limit, PDO::PARAM_INT);
    try {
        $prep->execute();
        $result = $prep->fetchAll();
        $prep->closeCursor();
        return $result;
    } catch (Exception $exx) {
        die($exx->getMessage());
    }
}

function pagination(int $nbtotalMessage, string $get = "page", int $pageActu = 1, int $perPage = 5): string
{
    $sortie = "";
    if ($nbtotalMessage === 0) return "";
    $nbPages = ceil($nbtotalMessage / $perPage);
    if ($nbPages == 1) return "";
    $sortie .= "<p>";
    for ($i = 1; $i <= $nbPages; $i++) {
        if ($i === 1) {
            if ($pageActu === 1) {
                $sortie .= "<< < 1 |";
            } elseif ($pageActu === 2) {
                $sortie .= " <a href='./'><<</a> <a href='./'><</a> <a href='./'>1</a> |";
            } else {
                $sortie .= " <a href='./'><<</a> <a href='?$get=" . ($pageActu - 1) . "'><</a> <a href='./'>1</a> |";
            }
        } elseif ($i < $nbPages) {
            if ($i === $pageActu) {
                $sortie .= "  $i |";
            } else {
                $sortie .= "  <a href='?$get=$i'>$i</a> |";
            }
        } else {
            if ($pageActu >= $nbPages) {
                $sortie .= "  $nbPages > >>";
            } else {
                $sortie .= "  <a href='?$get=$nbPages'>$nbPages</a> <a href='?$get=" . ($pageActu + 1) . "'>></a> <a href='?$get=$nbPages'>>></a>";
            }
        }
    }
    $sortie .= "</p>";
    return $sortie;
}
