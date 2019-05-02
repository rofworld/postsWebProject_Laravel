<!-- Grey with black text -->


<nav class="navbar-expand-lg bg-dark navbar-dark">
	
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item {{Request::is('home') ? 'active' : ''}}">
          <a class="nav-link" href="home">Home</a>
        </li>
        <li class="nav-item {{Request::is('trending') ? 'active' : ''}}">
          <a class="nav-link" href="trending">Trending</a>
        </li>
        <li class="nav-item {{Request::is('bestVideos') ? 'active' : ''}}">
          <a class="nav-link" href="bestVideos">Top 100</a>
        </li>
       </ul>
  
   
  
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
      		<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        		{{Auth::user()->name}}
      		</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="signout">Sign out</a>
              </div>
    	</li>
        <li class="nav-item">
      		<a class="nav-link" href="upload">Upload</a>
    	</li>
        </ul>
     </div>
</nav>



