<style>
    body {
        background: linear-gradient(135deg, #520f2e, #6c2244, #c5618f);
    }
</style>
<!-- FORM TO GET TASK'S DATA -->
<form id="form" class="object-small bg-dark p-4 my-5 text-light rounded-4" data-bs-theme='dark'>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" class="form-control mb-3">
    <div class="form-floating mb-3">
        <textarea name="description" id="description" class="form-control" placeholder="Description" style="height: 120px;"></textarea>
        <label for="description">Description</label>
    </div>
    <label for="scale">Scale</label>
    <input type="number" name="scale" id="scale" class="form-control mb-3">
    <div class="text-center">
        <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-success" style="width: 70%;">
    </div>
</form>

<!-- TABLE TO SHOW TASKS -->
<table class="table table-dark table-striped table-regular my-5">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Scale</th>
            <th>Author</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody id="tbody"></tbody>
</table>


<script src="public/js/JQuery.js"></script>
<script src="public/js/Queries.js"></script>
<script src="public/js/TasksPage.js"></script>