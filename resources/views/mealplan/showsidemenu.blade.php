<div id="">
    <div class="m-b center">
        <h4 class="text-center">แสดงเมนูอาหารของสัปดาห์</h4>
        <div id="week-picker"></div>
        
    </div>

    <!-- FILTER SECTION  -->

    @if(!Request::is('materialreport') ) 

        <div class="m-b">
            <h4 class="center"> สำหรับเด็กอายุ</h4>
            <ul class="nav nav-tab main-level age-range" id="">
                @if ($school->isForSmall())
                    <li class="">
                        <a  href="#" class="age-tab" id="8" data-age="is_for_small" aria-expanded="false" >
                            <span class="">ต่ำกว่า 1 ปี</span>
                        </a>
                    </li>
                @endif
                @if ($school->isForBig())
                    <li class="">
                        <a  href="#" class="age-tab" id="22" data-age="is_for_big"  aria-expanded="false" >
                            <span class="">1 - 3 ปี</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    @endif
</div>