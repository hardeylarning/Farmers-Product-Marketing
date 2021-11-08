<div class="dropdown-menu dropdown-menu-right mt-2" style="width: 500px; border: solid #161817 2px; border-radius: 10px; color: #161817;">
    <form action="/search" method="post" class="px-1 py-1">
        @csrf
        <div class="input-group text-white-50 p-2"  style="  " >
            <input type="search" name="search" id="" placeholder="Search for product here" class="form-control border: solid #161817 2px; border-radius: 10px; color: #161817; lm">
            <div class="input-group-append">
                <button type="submit" name="submit" value="search" class="btn btn-dark btn-block" >
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
