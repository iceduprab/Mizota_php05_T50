<?php
function db_connect()
{
    try {
        $db_name = 'gs_db5'; //データベース名
        $db_id   = 'root'; //アカウント名
        $db_pw   = ''; //パスワード：MAMPは'root'
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

function get_all_posts($pdo)
{
    //２．データ登録SQL作成
    $stmt = $pdo->prepare('SELECT * FROM gs_an_table;');
    $status = $stmt->execute();

    //３．データ表示
    $view = '';
    if ($status === false) {
        $error = $stmt->errorInfo();
        exit('SQLError:' . print_r($error, true));
    } else {
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //GETデータ送信リンク作成
            // <a>で囲う。
            $view .= '<p>';
            $view .= '<a href="detail.php?id=' . $result['id'] . '">';
            $view .= $result['indate'] . '：' . $result['name'];
            $view .= '</a>';
            $view .= '</p>';
        }
        return $view;
    }
}

function get_posts_by_id($pdo, $id)
{
    $stmt = $pdo->prepare('SELECT * FROM gs_an_table WHERE id = :id;');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();

    $result = '';
    if ($status === false) {
        $error = $stmt->errorInfo();
        exit('SQLError:' . print_r($error, true));
    } else {
        $result = $stmt->fetch();
        return $result;
    }
}