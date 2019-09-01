<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="mailbox.html">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                <span class="float-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <a href="profile.html">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="float-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <a href="grid_options.html">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="float-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="notifications.html">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-cogs"></i> Modules
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    @inject('module', 'App\Http\Controllers\ModuleController')
					@foreach ($module->getModuleList() as $val)
						<li>
							<a href="{{URL::to("/moduleChanger/".encrypt($val['id']))}}">
                                <i class="{{ $val['modules_icon'] }}" style="font-size:10px"></i> {{ $val['name'] }}
                            </a>
						</li>
					@endforeach
                </ul>
            </li>
        </ul>
    </nav>
</div>