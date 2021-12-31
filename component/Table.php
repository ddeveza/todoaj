<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id='openTaskModal'>
    Create New Task
</button>

<!-- add task modal-->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Task</h5>

            </div>
            <div class="modal-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Task</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" id="taskname"></textarea>
                </div>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Due Date</span>
                    </div>
                    <input type="date" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1" id="duedate">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id='closeTaskModal'>Close</button>
                <button type="button" class="btn btn-primary" id='saveTaskModal'>Add</button>
            </div>
        </div>
    </div>
</div>

<!-- edit task modal-->
<div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update task</h5>

            </div>
            <div class="modal-body">
                <input type="hidden" id="id" name="" value="">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Task</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" id="_taskname"></textarea>
                </div>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Due Date</span>
                    </div>
                    <input type="date" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1" id="_duedate">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id='closeEditModal'>Close</button>
                <button type="button" class="btn btn-primary" id='saveEditModal'>Save Changes</button>
            </div>
        </div>
    </div>
</div>




<table id='taskTable' class='display' style="border-style:ridge;">
    <thead>
        <tr>
            <td>id</td>
            <td>task</td>
            <td>Date Created</td>
            <td>Due Date</td>
            <td>Date Completed</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
        <td>id</td>
        <td>task</td>
        <td>Date Created</td>
        <td>Due Date</td>
        <td>Date Completed</td>
        <td>Status</td>
        <td>Action</td>
    </tfoot>
</table>