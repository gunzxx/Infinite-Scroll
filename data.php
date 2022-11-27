<?php while($post = $result->fetch_assoc()){ ?>
    <div class="post-id" id="<?php echo $post['id_post']; ?>">
        <h3><a href=""><?php echo $post['title']; ?></a></h3>
        <p><?php echo $post['content']; ?></p>
        <div class="text-right">
            <button class="btn btn-success">Read More</button>
        </div>
        <hr style="margin-top:5px;">
    </div>
<?php } ?>