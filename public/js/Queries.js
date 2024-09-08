function saveTask() {
    let data = {
        'name': $('#name').val(),
        'description': $('#description').val(),
        'scale': $('#scale').val()
    }

    $.ajax({
        method: 'POST',
        url: 'SaveTaskQuery.php',
        data: data,
        success: function(results) {
            alert("Object saved Successfully!");
            $('#name').val("");
            $('#description').val("");
            $('#scale').val("");
        },
        error: function(jqXHR, textStatus) {
            alert("ERROR");
        }
    });
}

function loadTasks() {
    let table = document.getElementById('tbody');
    $.ajax({
        method: 'GET',
        url: 'GetTasksQuery.php',
        success: function(results) {
            let newresults = JSON.parse(results);
            console.log(newresults);
            let info = '';
            let urlParams = new URLSearchParams(window.location.search);
            let user = urlParams.get('user');
            let buttonDelete = '';
            let buttonEdit = '';
            newresults.forEach(element => {
                if(element['task_user'] != user) {
                    buttonDelete = `<td><button class='btn btn-danger' disabled>Del</button></td>`;
                    buttonEdit = `<td><button class='btn btn-warning' disabled>Edit</button></td>`
                } else {
                    buttonDelete = `<td><button class='btn btn-danger' onclick='deleteTask(${element['task_id']})'>Del</button></td>`;
                    buttonEdit = `<td><a href="EditTask.php?object=${element['task_id']}&user=${element['task_user']}" class='btn btn-warning'>Edit</a></td>`
                }
                info += `
                    <tr>
                        <td>${element['task_name']}</td>
                        <td>${element['task_description']}</td>
                        <td>${element['task_scale']}</td>
                        <td>${element['task_user']}</td>
                        ${buttonDelete}
                        ${buttonEdit}
                    </tr>
                `
            });

            table.innerHTML = info;
        },

        error: function (jqXHR, error) {
            alert("Something has gone wrong");
        }
    });
}

function deleteTask(id) {
    $.ajax({
        method: 'POST',
        url: 'DeleteTaskQuery.php',
        data: {id: id},
        success: function(result) {
            alert(result);
            loadTasks();
        },
        error: function(jqXHR, error) {
            alert("Something has gone wrong");
        }
    });
}

function getOneTask() {
    let urlParams = new URLSearchParams(window.location.search);
    let objectParam = urlParams.get('object');

    data = {
        object: objectParam
    }

    $.ajax({
        method: 'POST',
        url: 'GetOneTaskQuery.php',
        data: data,
        success: function(results) {
            let resultsJson = JSON.parse(results);
            $('#name').val(resultsJson[0]['task_name']);
            $('#description').val(resultsJson[0]['task_description']);
            $('#scale').val(resultsJson[0]['task_scale']);
        },
        error: function(jqXHR, error) {
            alert("Something has gone wrong");
        }
    });
}