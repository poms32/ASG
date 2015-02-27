            <div class="leftside">
                <div class="sidebar">
                    <div class="user-box">
                        <div class="avatar">
                            <img src="{{asset('img/avatars/'.Auth::user()->id.'.png')}}" alt="" />
                        </div>
                        <div class="details">
                            <p>{{Auth::user()->firstname}}</p>
                            <span class="position">
                            @if(Auth::user()->is_admin)
                            	Superadmin
                            @else
                            	Membre
                            @endif
                            </span>
                        </div>
						<div class="button">
							<a href="{{url('logout')}}"><i class="fa fa-power-off"></i></a>
						</div>
                    </div>
                    <ul class="sidebar-menu">
						<li class="title">Menu</li>
                        <li class="active">
                            <a href="dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="inbox.html">
                                <i class="fa fa-rocket"></i> <span>Mes Sites</span>
                                <small class="label pull-right">{{Auth::user()->sites->count()}}</small>
                            </a>
                        </li>
                        <li class="sub-nav">
                            <a href="#">
                                <i class="fa fa-wordpress"></i> <span>Les CMSs</span>
                                <small class="label pull-right">{{Cms::count()}}</small>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="cms/create">Ajouter</a></li>
                                <li><a href="cms">Gérer</a></li>
                                <li><a href="cms/add_theme">Ajouter un thème</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="network">
                                <i class="fa fa-sitemap"></i>
                                <span>Réseaux</span>
                            </a>
                        </li>
                        <li>
                            <a href="hosting">
                                <i class="fa fa-server"></i> <span>Hosting</span>
                            </a>
                        </li>
                        <li class="sub-nav">
                            <a href="#">
                                <i class="fa fa-send"></i> <span>Domaines</span>
                                <i class="fa fa-angle-right pull-right"></i>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="basic-tables.html">Domain Scraper</a></li>
                                <li><a href="data-tables.html">Domain Buyer</a></li>
                            </ul>
                        </li>
						 <li>
                            <a href="widgets.html">
                                <i class="fa fa-exclamation-triangle"></i> <span>Site Generator</span>
                                @if(Auth::user()->domains->count() != 0)
                                <small class="label label-success pull-right">{{Auth::user()->domains->count()}}</small>
                                @endif
                            </a>
                        </li>
                    </ul>
				 </div>
            </div>
