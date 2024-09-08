loadTasks();

$('#form').submit(e=>{
    e.preventDefault();
    saveTask();
    loadTasks();
})