@extends('layouts.app')
@section('content')
<aside id="aside-menu">
    @include('kids.sidemenu')
</aside>
<div id="wrapper">
   	<h1 class="page-title">{{$classroom->class_name.' > '.$kid->firstname.' '.$kid->lastname}}</h1>
    <div class="row">
        <div class="col-lg-6">
            <div class="hpanel kid-panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <i class="light-icon fas fa-user-circle fa-7x"></i>
                        </div>
                        <div class="col-lg-9">
                            <div class="">
                                <div class="row">
                                    <div class="kid-name m-b col-lg-8">
                                        {{$kid->firstname.' '.$kid->lastname.' ( '.$kid->nickname.' )'}}
                                    </div>
                                    <div class="col-lg-4">
                                        <a class="pull-right" data-toggle="modal" data-target="#editKidForm">
                                            <span> <i class="fas fa-pen"></i> แก้ไข</span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="title"> ข้อมูลส่วนตัว </h4>
                                <div class="update">อัพเดทล่าสุดเมื่อ 2 เดือนที่แล้ว</div>
                                <div class="row">
                                    <div class="col-lg-2 panel-label">อายุ</div>
                                    <div class="col-lg-10 panel-text">
                                        {{$kid->getAge()}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 panel-label">เพศ</div>
                                    <div class="col-lg-10 panel-text">
                                        {{$kid->getSex()}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 panel-label">ห้อง</div>
                                    <div class="col-lg-10 panel-text">{{$kid->getClassName()}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 panel-label">การใช้พลังงาน</div>
                                    <div class="col-lg-8 panel-text">
                                        {{$kid->getActiveLevel()}}
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="hpanel kid-panel">
                <div class="panel-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="title"> บันทึกจากผู้ดูแล </h4>
                                <div class="update">อัพเดทล่าสุดเมื่อ 2 เดือนที่แล้ว</div>
                            </div>
                            <div class="col-lg-4">
                                <a class="pull-right" data-toggle="modal" data-target="#editNotesForm">
                                    <span> <i class="fas fa-pen"></i> แก้ไข</span>
                                </a>
                            </div>
                        </div>
                        <div class="note-card">
                            {{$kid->notes? $kid->notes: 'ยังไม่มีข้อความบันทึก'}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="hpanel kid-panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="title"> ข้อจำกัดอาหาร </h4>
                            <div class="update">อัพเดทล่าสุดเมื่อ 2 เดือนที่แล้ว</div>
                        </div>
                        <div class="col-lg-4">
                            <a class="pull-right" data-toggle="modal" data-target="#createRestrictionForm">
                                <span> <i class="fas fa-plus"></i> เพิ่ม</span>
                            </a>
                        </div>
                    </div>
                    
                    @if($kid->getRestrictions() == null)
                        <div class="">ไม่มีข้อมูลการแพ้อาหาร</div>
                    @endif

                    <div class="row m-t">
                        @foreach ($kid->getRestrictions() as $rest)
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <i class="light-icon fas fa-exclamation-circle fa-3x"></i>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-danger">
                                            {{$rest["type"]}}
                                        </div>
                                        <div class="text-extra">{{$rest["detail"]}}</div>
                                    </div>
                                    <div class="col-lg-3">
                                        <a class="" data-toggle="modal" data-target="#deleteRestriction{{$rest['id']}}">
                                            <span> <i class="fas fa-times"></i></span> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="hpanel kid-panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="title"> การดื่มนม </h4>
                            <div class="update">อัพเดทล่าสุดเมื่อ 2 เดือนที่แล้ว</div>
                        </div>
                        <div class="col-lg-4">
                            <a class="pull-right" data-toggle="modal" data-target="#editKidForm">
                                <span> <i class="fas fa-pen"></i> แก้ไข</span>
                            </a>
                        </div>
                    </div>
                    <div class="row m-t">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-3">
                                    <i class="light-icon fas fa-exclamation-circle fa-3x"></i>
                                </div>
                                <div class="col-lg-9">
                                    <div class="">การดื่มนม (มล. / ต่อวัน)</div>
                                    <div class="text-extra">200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hpanel kid-panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="title"> การเจริญเติบโต </h4>
                            <div class="update">อัพเดทล่าสุดเมื่อ 2 เดือนที่แล้ว</div>
                        </div>
                        <div class="col-lg-4">
                            <a class="pull-right" data-toggle="modal" data-target="#editKidForm">
                                <span> <i class="fas fa-pen"></i> แก้ไข</span>
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>วันที่</th>
                                    <th>ส่วนสูง (ซม.)</th>
                                    <th>น้ำหนัก (กก.)</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>25/03/63</td>
                                        <td>105</td>
                                        <td>16</td>
                                    </tr>
                                    <tr>
                                        <td>25/03/63</td>
                                        <td>105</td>
                                        <td>16</td>
                                    </tr>
                                    <tr>
                                        <td>25/03/63</td>
                                        <td>105</td>
                                        <td>16</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>	


<div class="modal fade" id="editKidForm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="color-line "></div>             -->
            <div class="modal-body">
                <h4 class="modal-title">แก้ไขข้อมูลเด็ก</h4>
                <form method="POST" action="/kid/edit/{{$kid->id}}" class="form-horizontal">   
                    @csrf 
                        <div class="form-group">
                            <label class="control-label">ชื่อจริง</label>
                            <div class=""><input type="text" value="{{$kid->firstname}}" name="firstname" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">นามสกุลจริง</label>
                            <div class=""><input type="text" value="{{$kid->lastname}}" name="lastname" class="form-control"></div>
                        </div>
                    
                    
                        <div class="form-group">
                            <label class="control-label">ชื่อเล่น</label>
                            <div class=""><input type="text" value="{{$kid->nickname}}" name="nickname" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">เพศ</label>
                            <div class="">
                                <select name="sex" class="form-control">
                                    <option value="male" {{$kid->sex=='male'? 'selected' : ''}}>ชาย </option>
                                    <option value="female" {{$kid->sex=='female'? 'selected' : ''}}>หญิง </option>
                                </select>
                            </div>
                        </div>
                        <label class="control-label">วัน เดือน ปี เกิด</label>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <select  value="" name="b-day" class="form-control">
                                    @for ($x = 1; $x <= 31; $x++)
                                        <option value="{{$x}}" {{$kid->getBirthDate() == $x? 'selected' : ''}}> {{$x}} </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <select  value="" name="b-month" class="form-control">
                                    <option value="01" {{$kid->getBirthMonth() =='01'? 'selected' : ''}}> มกราคม </option>
                                    <option value="02" {{$kid->getBirthMonth() =='02'? 'selected' : ''}}> กุมภาพันธ์ </option>
                                    <option value="03" {{$kid->getBirthMonth() =='03'? 'selected' : ''}}> มีนาคม </option>
                                    <option value="04" {{$kid->getBirthMonth() =='04'? 'selected' : ''}}> เมษายน </option>
                                    <option value="05" {{$kid->getBirthMonth() =='05'? 'selected' : ''}}> พฤษภาคม </option>
                                    <option value="06" {{$kid->getBirthMonth() =='06'? 'selected' : ''}}> มิถุนายน </option>
                                    <option value="07" {{$kid->getBirthMonth() =='07'? 'selected' : ''}}> กรกฎาคม </option>
                                    <option value="08" {{$kid->getBirthMonth() =='08'? 'selected' : ''}}> สิงหาคม </option>
                                    <option value="09" {{$kid->getBirthMonth() =='09'? 'selected' : ''}}> กันยายน </option>
                                    <option value="10" {{$kid->getBirthMonth() =='10'? 'selected' : ''}}> ตุลาคม </option>
                                    <option value="11" {{$kid->getBirthMonth() =='11'? 'selected' : ''}}> พฤศจิกายน </option>
                                    <option value="12" {{$kid->getBirthMonth() =='12'? 'selected' : ''}}> ธันวาคม </option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select  value="" name="b-year" class="form-control">
                                    @for ($x = 2020; $x >= 2000; $x--)
                                        <option value="{{$x}}"> {{$x}} </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">การใช้พลังงาน</label>
                            <div class="">
                                <select  name="active_level" class="form-control">
                                    <option value="high" {{$kid->active_level=='high'? 'selected' : ''}}> สูง </option>
                                    <option value="medium" {{$kid->active_level=='medium'? 'selected' : ''}}> ปานกลาง </option>
                                    <option value="low" {{$kid->active_level=='low'? 'selected' : ''}}> ต่ำ </option>
                                </select>
                            </div>
                        </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary" type="submit" name="create" value="">บันทึกการเปลี่ยนแปลง</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editNotesForm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="color-line "></div>             -->
            <div class="modal-body"> 
                <h4 class="modal-title">แก้ไขข้อความ</h4>
                <form method="POST" action="/kid/editnotes/{{$kid->id}}" class="form-horizontal">   
                    @csrf 
                    <div class="form-group">
                        <label class="control-label">บันทึกจากผู้ดูแล</label>
                        <div class="">
                            <textarea type="textarea" value="{{$kid->notes}}" name="notes" rows="5" class="form-control">{{$kid->notes}}</textarea>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary" type="submit" name="create" value="">บันทึกการเปลี่ยนแปลง</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editRestrictionForm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="color-line "></div>             -->
            <div class="modal-body"> 
                <h4 class="modal-title">ข้อกำจัดอาหาร</h4>
                <form method="POST" action="/kid/editrestriction/{{$kid->id}}" class="form-horizontal">   
                    @csrf
                    @foreach($kid->food_restrictions as $rest)
                        <div class="form-group">
                            <label class="control-label">ข้อกำจัดอาหาร</label>
                            <div class="">
                                <input type="hidden" id="" name="id" value="{{$rest->id}}">
                                <select  name="restrictions" class="form-control">
                                    <option value="no"> ไม่ระบุ </option>
                                    <option value="muslim" {{$rest->detail == 'muslim' ? 'selected':''}}> อาหารมุสลิม </option>
                                    <option value="vege" {{$rest->detail == 'vege' ? 'selected' : ''}}> อาหารมังสวิรัติ </option>
                                    <option value="vegan" {{$rest->detail == 'vegan' ? 'selected' : ''}}> อาหารเจ </option>
                                    <option value="milk" {{$rest->detail == 'milk' ? 'selected' : ''}}> แพ้อาหาร - แพ้นมวัว</option>
                                    <option value="breastmilk" {{$rest->detail == 'breastmilk' ? 'selected' : ''}}> แพ้อาหาร - แพ้นมแม่ </option>
                                    <option value="egg"{{$rest->detail == 'egg' ? 'selected' : ''}}> แพ้อาหาร - แพ้ไข่ไก่ </option>
                                    <option value="wheat" {{$rest->detail == 'wheat' ? 'selected' : ''}}> แพ้อาหาร - แพ้แป้งสาลี </option>
                                    <option value="shrimp" {{$rest->detail == 'shrimp' ? 'selected' : ''}}> แพ้อาหาร - แพ้กุ้ง </option>
                                    <option value="shell" {{$rest->detail == 'shell' ? 'selected' : ''}}> แพ้อาหาร - แพ้หอย </option>
                                    <option value="crab" {{$rest->detail == 'crab' ? 'selected' : ''}}> แพ้อาหาร - แพ้ปู </option>
                                    <option value="fish" {{$rest->detail == 'fish' ? 'selected' : ''}}> แพ้อาหาร - แพ้ปลา </option>
                                    <option value="peanut" {{$rest->detail == 'peanut' ? 'selected' : ''}}> แพ้อาหาร - แพ้ถั่วลิสง </option>
                                    <option value="soybean" {{$rest->detail == 'soybean' ? 'selected' : ''}}> แพ้อาหาร - แพ้ถั่วเหลือง </option>
                                </select>
                            </div>
                        </div>
                    @endforeach
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary" type="submit" name="create" value="">บันทึกการเปลี่ยนแปลง</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="createRestrictionForm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="color-line "></div>             -->
            <div class="modal-body"> 
                <h4 class="modal-title">ข้อกำจัดอาหาร</h4>
                <form method="POST" action="/kid/createrestriction/{{$kid->id}}" class="form-horizontal">   
                    @csrf
                    <div class="form-group">
                        <label class="control-label">ข้อกำจัดอาหาร</label>
                        <div class="">
                            <input type="hidden" id="" name="id" value="new">
                            <select  name="detail" class="form-control">
                                <option value="no"> ไม่ระบุ </option>
                                <option value="muslim"> อาหารมุสลิม </option>
                                <option value="vege"> อาหารมังสวิรัติ </option>
                                <option value="vegan"> อาหารเจ </option>
                                <option value="milk"> แพ้อาหาร - แพ้นมวัว </option>
                                <option value="breastmilk"> แพ้อาหาร - แพ้นมแม่ </option>
                                <option value="egg"> แพ้อาหาร - แพ้ไข่ไก่ </option>
                                <option value="wheat"> แพ้อาหาร - แพ้แป้งสาลี </option>
                                <option value="shrimp"> แพ้อาหาร - แพ้กุ้ง </option>
                                <option value="shell"> แพ้อาหาร - แพ้หอย </option>
                                <option value="crab"> แพ้อาหาร - แพ้ปู </option>
                                <option value="fish"> แพ้อาหาร - แพ้ปลา </option>
                                <option value="peanut"> แพ้อาหาร - แพ้ถั่วลิสง </option>
                                <option value="soybean"> แพ้อาหาร - แพ้ถั่วเหลือง </option>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary" type="submit" name="create" value="">บันทึกการเปลี่ยนแปลง</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($kid->getRestrictions() as $rest)
<div class="modal fade" id="deleteRestriction{{$rest['id']}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="color-line "></div>             -->
            <div class="modal-body"> 
                <h4 class="modal-title text-center">คุณแน่ใจหรือไม่</h4>
                <div class="text-center">
                    คุณกำลังจะลบช้อกำจัดอาหารของ {{$kid->getFullName()}}
                </div>
                <div class="text-center">
                    ลบข้อกำจัดอาหาร : {{$rest["type"]."(".$rest["detail"].")"}}
                </div>
                <form method="POST" action="/kid/deleterestriction/{{$rest['id']}}" class="form-horizontal text-center">   
                    @csrf
                    <input type="hidden" id="" name="kid_id" value="{{$kid->id}}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary" type="submit" name="create" value="">ลบ</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection