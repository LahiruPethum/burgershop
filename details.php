<?php
    include('config/db_connect.php');

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM burgers WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            header('Location: index.php');
        }else{
            echo 'Query error: ' . mysqli_error($conn);
                }
    
    }


    //check GET
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM burgers WHERE id = $id";

        //get qury
        $result = mysqli_query($conn, $sql);

        $burger = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        // print_r($burger);


    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include('template/header.php'); ?>
<div class="container center grey-text">
    <?php if($burger) : ?>
        <h4><?php echo htmlspecialchars($burger["title"]); ?></h4>
        <p>Created by: <?php echo htmlspecialchars($burger["email"]); ?></p>
        <p><?php echo date($burger["created_at"]); ?></p>
        <h5>Ingredients:</h5>
        <p><?php echo htmlspecialchars($burger["ingredients"]);?></p>


        <!-- //delete form -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $burger['id']?>">

            <input type="submit" name='delete' value='Delete' class='btn red z-depth-0'>

        </form>


        <?php else:?>
            <h5>No any burger in stock!</h5>
        <?php endif; ?>
</div>
<?php include('template/footer.php'); ?>
</html>