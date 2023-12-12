<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the data from the form
    $comment = $_POST["comment"];

    // Save the data to the database
    $sql = "INSERT INTO comments (comment)
            VALUES ('$comment')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // The comment was saved successfully
        echo "شكرا لك على تعليقك! سيتم عرضه قريبًا.";
    } else {
        // The comment was not saved successfully
        echo "حدث خطأ أثناء حفظ تعليقك. الرجاء المحاولة مرة أخرى.";
    }

}

?>
<ul>
    <?php

    // Get the comments from the database
    $sql = "SELECT * FROM comments";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <li>
                <p><?php echo $row["comment"]; ?></p>
            </li>

            <?php
        }
    } else {
        ?>

        <li>لا توجد تعليقات حتى الآن.</li>

        <?php
    }

    ?>
</ul>
