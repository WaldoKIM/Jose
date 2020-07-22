<!--- 게시글 수정 -->
<?php include "../../db.php";

   
	$bno = $_GET['tidx'];
	$sql = mq("select * from plaza_tablero where tidx='$bno';");
	$board = $sql->fetch_array();
 ?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" href="/css/style.css" />
</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="modify_ok.php" method="post">
                    <p>
              <input type="hidden" name="tidx" value="<?php echo $bno;?>">
            </p>          
                    <div id="in_title">
                        <textarea name="ttitle" id="ttitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['ttitle']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="unombre" id="unnombre" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php echo $board['unombre']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="tcontent" id="tcontent" placeholder="내용" required><?php echo $board['tcontent']; ?></textarea>
                    </div>
                                      <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>