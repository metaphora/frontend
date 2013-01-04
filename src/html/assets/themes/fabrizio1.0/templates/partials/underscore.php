<?php $isAdmin = $this->user->isAdmin(); ?>
<script type="tmpl/underscore" id="photo-meta">
  <div class="photo-meta">
    <?php if($isAdmin) { ?>
      <h4 class="title edit"><a href="/p/<%= id %>" title="Update the title"><%= title || filenameOriginal %></a></h4>
      <ul class="info">
        <li><a href="#"><i class="tb-icon-small-comment tb-icon-dark"></i> <span class="number">24</span></li>
        <li><a href="#"><i class="tb-icon-small-heart tb-icon-dark"></i> <span class="number">24</span></li>
        <li><a href="#"><i class="tb-icon-small-maximize tb-icon-dark"></i> <span class="number">Share</span></li>
        <li><a href="#" title="Toggle the privacy setting"><i class="tb-icon-small-<%= permission == 0 ? 'locked' : 'unlocked' %> tb-icon-dark permission edit" data-id="<%= id %>"></i></li>
        <li><a href="#" title="Set as your profile photo"><i class="tb-icon-small-profile tb-icon-dark profile edit" data-id="<%= id %>"></i></li>
        <li><a href="#" title="Select for batch editing"><i class="tb-icon-small-pin tb-icon-dark pin edit" data-id="<%= id %>"></i></li>
      </ul>
    <?php } else { ?>
      <h4 class="title"><%= title || filenameOriginal %></h4>
      <ul class="info">
        <li><a href="#"><i class="tb-icon-small-comment tb-icon-dark"></i> <span class="number">24</span></li>
        <li><a href="#"><i class="tb-icon-small-heart tb-icon-dark"></i> <span class="number">24</span></li>
        <li><a href="#"><i class="tb-icon-small-maximize tb-icon-dark"></i> <span class="number">Share</span></li>
      </ul>
    <?php } ?>
  </div>
</script>
<script type="tmpl/underscore" id="profile-photo-meta">
  <img class="profile-pic profile-photo" src="<%= photoUrl %>" />
</script>
<!--
  <img class="profile-pic profile-photo" src="<%= photoUrl %>" />
-->

<script type="tmpl/underscore" id="user-badge-meta">
  <h4 class="profile-name-meta username"><span class="name <?php if($isAdmin) { ?> edit <?php } ?>"><%= name %></span></h4>
  <div class="tray-wrap">
    <span class="avatar"><img class="avatar profile-pic profile-photo" src="<%= photoUrl %>" /></span>
    <div class="tray">
      <div class="details">
        <ul>
          <li>
            <a href="#">
              <i class="tb-icon-gallery"></i>
              <span class="number"><%= counts.photos %></span>
              <span class="title">photos</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="tb-icon-albums"></i>
              <span class="number"><%= counts.albums %></span>
              <span class="title">albums</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="tb-icon-tag"></i>
              <span class="number"><%= counts.tags %></span>
              <span class="title">tags</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</script>

<script type="tmpl/underscore" id="profile-name-meta">
  <span class="name <?php if($isAdmin) { ?> edit <?php } ?>" <?php if($isAdmin) { ?>title="Change display name"<?php } ?>><%= name %></span>
</script>

<script type="tmpl/underscore" id="op-lightbox">
  <div class="op-lightbox">
    <div class="header">
      <div class="container">
        <div class="logo"></div>
      </div>
    </div>
    <div class="bd">
      <div class="photo">
        <div class="nav">
          <a href="#" class="prev">&lt;</a>
          <a href="#" class="next">&gt;</a>
        </div>
      </div>
      <div class="details">
        <div class="container">
        
        </div>
      </div>
    </div>
  </div>
</script>
<script type="tmpl/underscore" id="op-lightbox-details">
  <div class="detail-block">
    <div class="title">
      <span class="text"><%= title || filenameOriginal %></span>
      <a href="#"><i class="tb-icon-heart tb-icon-dark"></i></a>
    </div>
    <div class="description"><%= description %></div>
  </div>
  <div class="action-block">
  
  </div>
</script>

<script type="tmpl/underscore" id="album-meta">
  <li>
    <a href="/photos/album-<%= id %>/list">
      <img src="<%= cover.path200x200xCR %>">
    </a>
    <?php if($isAdmin) { ?>
      <h5 class=" name edit"><%= name %></h5>
    <?php } else { ?>
      <h5 class="name"><%= name %></h5>
    <?php } ?>
  </li>
</script>

<script type="tmpl/underscore" id="photo-detail-meta">
  <img src="<%= path870x550 %>">
  <br>
  <?php if($isAdmin) { ?>
    <a href="#" class="title edit"><%= title %></a>
    <br>
    <a href="#" class="description edit"><%= description %></a>
  <?php } else { ?>
   <%= title %>
   <br>
   <%= description %>
  <?php } ?>

   <hr>

  <% if (!_.isNull(previous)) { %>
    <% if (previous[0]) { %>
      <a class="paginate" data-id="<%= previous[0].id %>">
        <img src="<%= previous[0].path90x90xCR %>">
      </a>
    <% } %>
    <% if (previous[1]) { %>
      <a class="paginate" data-id="<%= previous[1].id %>">
        <img src="<%= previous[1].path90x90xCR %>">
      </a>
    <% } %>
  <% } %>
  --
  <% if (!_.isNull(next)) { %>
    <% if (next[0]) { %>
      <a class="paginate" data-id="<%= next[0].id %>">
        <img src="<%= next[0].path90x90xCR %>">
      </a>
    <% } %>
    <% if (next[1]) { %>
      <a class="paginate" data-id="<%= next[1].id %>">
        <img src="<%= next[1].path90x90xCR %>">
      </a>
    <% } %>
  <% } %>
  <ul>
    <% for(var tag in tags) { %>
      <li><%= tags[tag] %></li>
    <% } %>
  </ul>
</script>

<script type="tmpl/underscore" id="batch-meta">
  <a data-toggle="dropdown" href="#"><i class="tb-icon-light tb-icon-pin"></i> Batch Edit <% if (count > 0) { %><span class="badge badge-important"><%= count %></span><% } %></a>
  <ul class="dropdown-menu">
    <% if (count > 0) { %>
      <li><a>Batch edit your photos</a></li>
      <li class="divider"></li>
      <li><a href="#">&nbsp;&middot;&nbsp;Add or Remove Tags</a></li>
      <li><a href="#">&nbsp;&middot;&nbsp;Organize Into Albums</a></li>
      <li><a href="#">&nbsp;&middot;&nbsp;Manage Privacy</a></li>
      <li><a href="#">&nbsp;&middot;&nbsp;Edit Date and Location</a></li>
      <li><a href="#">&nbsp;&middot;&nbsp;Rotate 90&deg; CW</a></li>
      <li class="divider"></li>
      <li><a href="#" class="clear">Clear pinned photos</a></li>
    <% } else { %>
      <li><a>Select photos by clicking <i class="tb-icon-light tb-icon-pin"></i></a></li>
    <% } %>
  </ul>
</script>
