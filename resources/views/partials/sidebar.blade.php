
          <div class="col-md-4 col-xl-3">
            <div class="sidebar px-4 py-md-0">

              <h6 class="sidebar-title">Search</h6>
              <form class="input-group" action="" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Search Post Title" value="{{request()->query('search')}}">
                <div class="input-group-addon">
                  <span class="input-group-text"><i class="ti-search"></i></span>
                </div>
              </form>

              <hr>

              <h6 class="sidebar-title">Categories</h6>
              <div class="row link-color-default fs-14 lh-24">
                 @if ($categories)
                 @foreach ($categories as $category)
                     <div class="col-6"><a href="{{route('blog.category',$category->id)}}">{{$category->name}}</a></div>
                @endforeach
                 @endif
              </div>

              <hr>
              <h6 class="sidebar-title">Top posts</h6>
              @if ($newest)
              @foreach ($newest as $recent)
              <a class="media text-default align-items-center mb-5" href="{{route('blog.show',$recent->id)}}">
                <img class="rounded w-65px mr-4" src="{{asset($recent->photo ? $recent->photo->file : 'http://placehold.it/400x400')}}">
                <p class="media-body small-2 lh-4 mb-0">{{$recent->title}}</p>
              </a>
              @endforeach
              @endif

              <hr>

              <h6 class="sidebar-title">Tags</h6>
              <div class="gap-multiline-items-1">
               @if ($tags)
                   @foreach ($tags as $tag)
                   <a class="badge badge-secondary" href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a>
                   @endforeach
               @endif
              </div>

              <hr>

              <h6 class="sidebar-title">About</h6>
              <p class="small-3">This is a Blog Content Management System Made With PHP Laravel Framework, Javascript, Bootstrap, HTML, CSS, SASS and So much more......Enjoy :)</p>


            </div>
          </div>