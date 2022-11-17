<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('admin.home.index') }}">
            <img src="/template/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
            <img
                src="/template/vendors/images/deskapp-logo-white.svg"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span>
                        <span class="mtext">Danh mục thiết bị</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.category.index') }}">Tất cả loại thiết bị</a></li>
                        <li><a href="{{ route('admin.category.create') }}">Thêm loại thiết bị mới</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span>
                        <span class="mtext">Thiết bị</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.device.index') }}">Tất cả</a></li>
                        <li>
                            <a href="advanced-components.html">Máy tính</a>
                        </li>
                        <li><a href="form-wizard.html">Máy in</a></li>
                        <li><a href="html5-editor.html">Máy chiếu</a></li>
                        <li><a href="form-pickers.html">Điều hòa</a></li>
                        <li><a href="image-cropper.html">Thiết bị đã thanh lý</a></li>
                        <li><a href="{{ route('admin.device.create') }}">Thêm thiết bị mới</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-table"></span
                        ><span class="mtext">Bộ phận</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.action.department.index') }}">Danh sách các bộ phận</a></li>
                        <li><a href="datatable.html">Thêm thiết bị vào bộ phận</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-archive"></span
                        ><span class="mtext">Sửa chữa thiết bị </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="ui-buttons.html">Danh sách sửa chữa</a></li>
                        <li><a href="ui-cards.html">Thêm thiết bị sửa chữa</a></li>
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-command"></span
                        ><span class="mtext">Quản lý tác vụ</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.action.department.index') }}">Quản lý bộ phận</a></li>
                        <li><a href="{{ route('admin.action.depot.index') }}">Quản lý kho</a></li>
                        <li><a href="{{ route('admin.action.supplier.index') }}">Quản lý nhà cung cấp</a></li>
                    
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-file-earmark-text"></span
                        ><span class="mtext">Quản lý người dùng</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.user.index') }}">Danh sách người dùng</a></li>
                        <li><a href="{{ route('admin.user.create') }}">Thêm người dùng</a></li>                      
                    </ul>
                </li>
                
                
            </ul>
        </div>
    </div>
</div>