
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <div class="card-body">
                    <div class="text-right">
                    <?php foreach ($taisans as $taisan): ?>
                        <?php if ($taisan->id == $bangiaotaisan->taisan_id): ?>
                            <?php foreach ($taisans as $taisan): ?>
                                <?php if ($taisan->id == $bangiaotaisan->taisan_id): ?>
                                    <img class="img-thumbnail"
                                        src="/public/images/{{ $taisan->hinhanh }} "
                                            height="170" width="170">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                    <table  class="table table-striped table-bordered table-hover">
                    <?php foreach ($taisans as $taisan): ?>
                            <?php if ($taisan->id == $bangiaotaisan->taisan_id): ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="text">Tên Tài Sản</label>
                                        <?php foreach ($taisans as $taisan): ?>
                                            <?php if ($taisan->id == $bangiaotaisan->taisan_id): ?>
                                                <select name="taisanthuhoi" class="form-control">  
                                                    <option value="{{$taisan->id}}">{{$taisan->tentaisan}} |SL mượn: {{$bangiaotaisan->so_luong_ban_giao}}</option>
                                                </select>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Ngày Thu Hồi</label>
                                        <input name="ngaythuhoi" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required=""  type="date">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Tình Trạng Tài Sản</label>
                                        <select name="tinhtrang" class="form-control tinhtrang" 
                                        onchange="if(this.options[this.selectedIndex].value=='customOption'){
                                            toggleField(this,this.nextSibling);
                                            this.selectedIndex='0';
                                        }">
                                            <option value="">--Chọn--</option>
                                            <option value="1">Bình Thường</option>
                                            <option value="2">Hư Hỏng</option>
                                            <option value="3">Mất Tài Sản</option>
                                            <option value="customOption">--Khác--</option>

                                            </select><input name="tinhtrang" class="form-control" style="display:none;" disabled="disabled" 
                                            onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="text">Nhân Viên Thu Hồi</label>
                                        <select name="nhanvienthuhoi" class="form-control">  
                                            <option value="">--Chọn Nhân Viên Thu Hồi--</option>
                                            @foreach($users as $key => $user) 
                                                <option value="{{$user->id}}">{{$user->last_name}} {{$user->first_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <br>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Bộ Phận Bị Thu Hồi</label>
                                        <?php foreach ($phongbans as $phongban): ?>
                                            <?php if ($phongban->id == $bangiaotaisan->phongbannhantaisan_id): ?>
                                                <select name="phongbanbithuhoi" class="form-control">  
                                                        <option value="{{$phongban->id}}">{{$phongban->tenphongban}}</option>
                                                </select>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="text">Nhân Viên Bị Thu Hồi</label>
                                        <?php foreach ($nhanviens as $nhanvien): ?>
                                            <?php if ($nhanvien->id == $bangiaotaisan->nhanviennhantaisan_id): ?>
                                                <select name="nhanvienbithuhoi" class="form-control">  
                                                    <option value="{{$nhanvien->id}}">{{$nhanvien->tennhanvien}}</option>
                                                </select>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Số Lượng Thu Hồi</label>
                                        <input type="number" min="1" name="soluong" class="form-control"  step="1" ></input>
                                    </div> 
                                </div>
                                <br>
                                <div class="col-md-12">
                                    {!! Form::normalTextarea('lidothuhoi', 'Lí Do Thu Hồi', $errors, ['class' => 'form-control']) !!}
                                </div>          
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
          <!-- /.col -->
    </div>
        <!-- /.row -->
</div>


