<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Admin Area</a>
            </div>
            <!-- /.navbar-header -->
            <form class="navbar-default" style="float: right" action="language" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <button type="submit" name="locale" value="vi">vi</button>
                <button type="submit" name="locale" value="en">en</button>
            </form>
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-user">
                        @if(Auth::check())
                        <li><i class="fa fa-user fa-fw"></i>{{Auth::user()->name}}</li>
                        <li><a href="admin/staff/edit/{{Auth::user()->id}}"><i class="fa fa-gear fa-fw"></i>Settings</a></li>
                        <li><a href="changepassword/{{Auth::id()}}"><i class="fa fa-gear fa-fw"></i>Changepass</a></li>
                        <li class="divider"></li>
                        <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                        @endif
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            @include('admin.layout.menu')
            <!-- /.navbar-static-side -->
        </nav>