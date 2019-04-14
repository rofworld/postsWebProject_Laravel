<!-- Grey with black text -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
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
    <li class="nav-item">
      <button class="btn-primary" id="uploadButton">Upload</button>
    </li>
  </ul>
</nav>