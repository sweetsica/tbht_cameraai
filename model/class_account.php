<?php
class account{
    private $conn;
    public function __construct($db)
    {
        $this->conn=$db;
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }  
    public function bang(){
        $sql=mysqli_query($this->conn,"SELECT * from user Where id=".$_GET['id']."");
        while($hien=mysqli_fetch_assoc($sql)){
            echo'
            <div class="list-group-item">
                <div class="form-group row align-items-center mb-0">
                    <label class="form-label col-form-label col-sm-3">Mã Nhân Viên</label>
                    <div class="col-sm-9">
                        <h2>'.$hien['id'].'</h2>
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row align-items-center mb-0">
                    <label class="form-label col-form-label col-sm-3">Họ và tên</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="'.$hien['fullname'].'" placeholder="Ghi họ và tên">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row align-items-center mb-0">
                    <label class="form-label col-form-label col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="'.$hien['email'].'" placeholder="Ghi email">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row align-items-center mb-0">
                    <label class="form-label col-form-label col-sm-3">Ngày sinh</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" value="'.$hien['date_birth'].'">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
            <div class="form-group row align-items-center mb-0">
                <label class="form-label col-form-label col-sm-3">Ngày vào</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="'.$hien['date_job_receive'].'">
                </div>
            </div>
        </div>
        <div class="list-group-item">
        <div class="form-group row align-items-center mb-0">
            <label class="form-label col-form-label col-sm-3">Vai Trò</label>
            <div class="col-sm-9">
            <select id="cars" value="'.$hien['role'].'">
            <option value="1">Admin</option>
            <option value="2">Quản lý</option>
            <option value="3">Nhân Viên</option>
          </select>
            </div>
            
        </div>
    </div>
    </div>
            ';
            
        }

    }
}
?>
                                       