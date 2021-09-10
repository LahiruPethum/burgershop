<?php
   
   include('config/db_connect.php');
    //query
    $sql = 'SELECT title, ingredients, id FROM burgers ORDER BY created_at';

    $result = mysqli_query($conn, $sql);

    $burgers = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);

    mysqli_close($conn);

    // print_r($burgers);

?>
<!DOCTYPE html>
<html lang="en">

<?php include('template/header.php');?>

<h4 class="center grey-text">burgers</h4>

<div class="container">
    <div class="row">
        <?php foreach($burgers as $burger) : ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <img src="img/burger.svg" class="burger">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($burger['title'])?></h6>
                        <ul >
                            <?php foreach(explode(',', $burger['ingredients']) as $ingredient): ?>
                            <li>
                                <?php echo htmlspecialchars($ingredient); ?>
                            </li>  
                            <?php endforeach; ?> 
                        </ul>

                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text" href="details.php?id=<?php echo $burger['id']?>">more info</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if(count($burgers)>=3):?>
            <!-- <p>There are 3 or more burgers</p> -->
            <?php  else : ?>
                <!-- <p>There are less than 3 burgers</p> -->
        <?php endif; ?>
    </div>
</div>

<?php include('template/footer.php');?>  

</html>