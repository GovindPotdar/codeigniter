<?php include "header.php"; ?>
<div class="container">
<!-- ############################################ -->
<div class="alert alert-info "><a class="btn btn-info"  href="<?php echo base_url("Admin/logout"); ?>">logout</a>
<a class="btn btn-info"  href="<?php echo base_url("Admin/add_article"); ?>">Add article</a>
</div>
<!-- ############################################ -->
<?php if($data): ?>
<table>
<thead>
<th>id</th>
<th>title</th>
<th>body</th>
<th>delete</th>
</thead>

<?php foreach ($data as $dt): ?>
<tr>
<td><?php echo $dt['id']; ?></td>
<td><?php echo $dt['article_title']; ?></td>
<td><?php echo $dt['article_body']; ?></td>

<td><a href=<?php echo base_url("Admin/delete_article")."?id=".$dt['id']; ?> class="btn btn-danger">delete</a></td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<p class="alert alert-info">no data found</p>
<?php endif; ?>

</table>
</div>
<?php include "footer.php"; ?>