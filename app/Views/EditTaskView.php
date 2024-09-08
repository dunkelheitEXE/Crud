<form class="object-small bg-dark text-light p-3 my-5 rounded-4" data-bs-theme="dark" method="POST" action="EditTask.php?object=<?=$_GET['object']?>&user=<?=$_GET['user']?>">
    <legend>Edit Task '<?= $_GET['object'] ?>'</legend>
    <div class="input-group mb-3">
        <span class="input-group-text">Name</span>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Description</span>
        <textarea name="description" id="description" class="form-control" style="height: 100px;"></textarea>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Scale</span>
        <input type="number" name="scale" id="scale" class="form-control">
    </div>
    <div class="text-center">
        <input type="submit" value="Confirm" name="submit" class="btn btn-success" style="width: 70%;">
    </div>
</form>

<script src="public/js/JQuery.js"></script>
<script src="public/js/Queries.js"></script>
<script src="public/js/EditTask.js"></script>