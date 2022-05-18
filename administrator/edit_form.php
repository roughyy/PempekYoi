<?php
    include('connection.php');
    include 'function.php';
    $header = encrypt("comments");
    if ($_POST['list_id']) {
        $list_id = decrypt($_POST['list_id']);
        $query = "SELECT user.user_name, notes.* FROM notes LEFT JOIN user ON user.uid = notes.uid WHERE list_id='$list_id' ORDER BY time_stamp asc";
        //echo $query;
        $add_comments = $db->prepare($query);
        $add_comments->execute();
        while( $row = $add_comments->fetch(PDO::FETCH_ASSOC) ) {
            $uid = $row['user_name'];
            $comments = $row['comments'];
            ?>
               
                    <div class="col-lg-12">
                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                <h5><?php echo $uid ?> | <?php echo $row['time_stamp'] ?></h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title ">Notes:</h5>
                                <p class="card-text"><?php echo $comments ?></p>
                            </div>
                        </div>
                    </div>

            <?php
        }
    ?>
        <form id="formoid" title="" action="add.php?f=<?php echo $header ?>&i=<?php echo $_GET['i'] ?>" method="post">
            <textarea id="elm2" name="elm2"></textarea>
            <input name="list_id" hidden id="list_id" value="<?php echo encrypt($list_id) ?>">
            <br>
        <button class="btn btn-primary" id="add_button">Add notes </button>
        </form>
        <script>
            CKEDITOR.replace( 'elm2' );
        </script>

        
    <?php } ?>
 