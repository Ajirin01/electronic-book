<nav class="navbar navbar-expand-lg custom_nav-container pt-3">
    <a class="navbar-brand" href="index">
    <img src="images/Electronic_logo.png"  style="width: 45px; height: 44.5px;" /><span>
        <!-- Tropiko -->
        Electronic
    </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
        <ul class="navbar-nav  ">
        <li class="nav-item active">
            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
            <div class="btn-group" style="margin-top: 8px">
                <a href="#" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Resources</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item" type="button" data-toggle="modal" data-target="#constantsModal">Physical Constants</button>
                    <button class="dropdown-item" type="button" data-toggle="modal" data-target="#calculatorModal">Scientific Calculator</button>
                </div>
            </div>
        </li>
        
        <li class="nav-item active">
            <a class="nav-link" data-toggle="modal" data-target="#contentMenuModal" href="#Contents">Contents <span class="sr-only">(current)</span></a>
        </li>

        <?php if(isset($_SESSION['user'])){ ?>
            <li class="nav-item active">
            <a class="nav-link" href="handlers/logout">Logout</a>
            </li>
        <?php }else{ ?>
            <li class="nav-item active">
            <a class="nav-link" href="login">Login</a>
            </li>
        <?php ;} ?>

    </div>
    <div class="ml-0 ml-lg-4 d-flex justify-content-center">
        <a href="" class="btn px-0 ml-3">
            <i class="fas fa-shopping-cart text-primary"  style="color: black !important"></i>
            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px; color: black !important; border-color: black !important;">0</span>
        </a>
    </div>
    </div>
</nav>