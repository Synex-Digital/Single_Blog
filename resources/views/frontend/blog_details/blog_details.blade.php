@extends('frontend.index')
@section('content')
    <!-- section main content -->
	<section class="main-content mt-3">
		<div class="container-xl">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Inspiration</a></li>
                    <li class="breadcrumb-item active" aria-current="page">3 Easy Ways To Make Your iPhone Faster</li>
                </ol>
            </nav>

			<div class="row gy-4">

				<div class="col-lg-8">
					<!-- post single -->
                    <div class="post post-single">
						<!-- post header -->
						<div class="post-header">
							<h1 class="title mt-0 mb-3">{{ $blog_detail->blog_title }}</h1>
							<ul class="meta list-inline mb-0">
								<li class="list-inline-item"><a href="#"><img style="width: 40px;" src="{{ asset('files/profile/'.$blog_detail->admin->profile) }}" class="author" alt="author"/>Katen Doe</a></li>
								<li class="list-inline-item"><a href="#">Trending</a></li>
								<li class="list-inline-item">{{ \Carbon\Carbon::parse($blog_detail->from_date)->format('d M Y')}}</li>
							</ul>
						</div>
						<!-- featured image -->
						<div class="featured-image">
							<img style="width: 100%" src="{{ asset('files/blog/'.$blog_detail->blog_image) }}" />
						</div>
						<!-- post content -->
						<div class="post-content clearfix">
							{!! $blog_detail->blog_description !!}
						</div>
						<!-- post bottom section -->
						<div class="post-bottom">
							<div class="row d-flex align-items-center">
								<div class="col-md-6 col-12 text-center text-md-start">
									<!-- tags -->
									<a href="#" class="tag">#Trending</a>
									<a href="#" class="tag">#Video</a>
									<a href="#" class="tag">#Featured</a>
								</div>
								<div class="col-md-6 col-12">
									<!-- social icons -->
									<ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
										<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
									</ul>
								</div>
							</div>
						</div>

                    </div>

					<div class="spacer" data-height="50"></div>

					<div class="about-author padding-30 rounded">
						<div class="thumb">
							<img src="{{ asset('frontend') }}/images/other/avatar-about.png" alt="Katen Doe" />
						</div>
						<div class="details">
							<h4 class="name"><a href="#">Katen Doe</a></h4>
							<p>Hello, I’m a content writer who is fascinated by content fashion, celebrity and lifestyle. She helps clients bring the right content to the right people.</p>
							<!-- social icons -->
							<ul class="social-icons list-unstyled list-inline mb-0">
								<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Comments ({{ $total_comment }})</h3>
						<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
					</div>
					<!-- post comments -->
					<div class="comments bordered padding-30 rounded">

						<ul class="comments">
							<!-- comment item -->
							@foreach ($comments as $comment)
							<li class="comment rounded">
								<div class="thumb">
									@if ($comment->user_id)
									<img style="width: 50px;" src="{{ asset('files/profile/'.$comment->admin->profile) }}" alt="John Doe" />
									@endif
									
								</div>
								<div class="details">
									<h4 class="name"><a href="#">{{ $comment->commenter_name }}</a></h4>
									<span class="date">{{ \Carbon\Carbon::parse($comment->from_date)->format('d M Y H:i:s')}}</span>
									<p>{{ $comment->comment }}</p>
									<a href="" class="btn btn-default btn-sm">Reply</a> 
								</div>
							</li>
							@endforeach
						</ul>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Leave Comment</h3>
						<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
					</div>
					<!-- comment form -->
					<div class="comment-form rounded bordered padding-30">

						<form action="{{ route('comment') }}" id="comment-form" class="comment-form" method="POST">
							@csrf
							<input type="hidden" name="blog_id" value="{{ $blog_detail->id }}">
							<div class="messages"></div>
							<div class="row">

								<div class="column col-md-12">
									<!-- Comment textarea -->
									<div class="form-group">
										<textarea name="comment" id="InputComment" class="form-control" rows="4" placeholder="Your comment here..." required="required" ></textarea>
									</div>
								</div>

								<div class="column col-md-6">
									<!-- Email input -->
									<div class="form-group">
										<input type="email" class="form-control" id="InputEmail" name="email" placeholder="Email address" required="required">
									</div>
								</div>

								<div class="column col-md-6">
									<!-- Name input -->
									<div class="form-group">
										<input type="text" class="form-control" name="website" id="InputWeb" placeholder="Website">
									</div>
								</div>
	
								<div class="column col-md-12">
									<!-- Email input -->
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Your name" required="required">
									</div>
								</div>
						
							</div>
							<button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit</button><!-- Submit Button -->
	
						</form>
					</div>
                </div>

				<div class="col-lg-4">

					<!-- sidebar -->
					<div class="sidebar">
						<!-- widget about -->
						<div class="widget rounded">
							<div class="widget-about data-bg-image text-center" data-bg-image="{{ asset('frontend') }}/images/map-bg.png">
								<img src="{{ asset('frontend') }}/images/logo.svg" alt="logo" class="mb-4" />
								<p class="mb-4">Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.</p>
								<ul class="social-icons list-unstyled list-inline mb-0">
									<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
								</ul>
							</div>
						</div>

						<!-- widget popular posts -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Popular Posts</h3>
								<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<!-- post -->
								@foreach ($popular_posts as $popular_post)
									<div class="post post-list-sm circle">
										<div class="thumb circle">
											<span class="number">1</span>
											<a href="blog-single.html">
												<div class="inner">
													<img style="width: 70px; height: 60px;;" src="{{ asset('files/blog/'.$popular_post->blog_image) }}" alt="post-title" />
												</div>
											</a>
										</div>
										<div class="details clearfix">
											<h6 class="post-title my-0"><a href="{{ route('blog.details', ['id'=>$popular_post->id]) }}">{{ $popular_post->blog_title }}</a></h6>
											<ul class="meta list-inline mt-1 mb-0">
												<li class="list-inline-item">29 March 2021</li>
											</ul>
										</div>
									</div>
								@endforeach
								<!-- post -->
								
							</div>		
						</div>

						<!-- widget categories -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Explore Topics</h3>
								<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<ul class="list">
                                    @foreach ($categories as $category)
									 <li><a href="#">{{ $category->category_name }}</a><span>(5)</span></li>
                                    @endforeach
								</ul>
							</div>
							
						</div>

						<!-- widget newsletter -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Newsletter</h3>
								<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
								<form>
									<div class="mb-2">
										<input class="form-control w-100 text-center" placeholder="Email address…" type="email">
									</div>
									<button class="btn btn-default btn-full" type="submit">Sign Up</button>
								</form>
								<span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>
							</div>		
						</div>

						<!-- widget post carousel -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Celebration</h3>
								<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<div class="post-carousel-widget">
									<!-- post -->
									<div class="post post-carousel">
										<div class="thumb rounded">
											<a href="category.html" class="category-badge position-absolute">How to</a>
											<a href="blog-single.html">
												<div class="inner">
													<img src="{{ asset('frontend') }}/images/widgets/widget-carousel-1.jpg" alt="post-title" />
												</div>
											</a>
										</div>
										<h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
										<ul class="meta list-inline mt-2 mb-0">
											<li class="list-inline-item"><a href="#">Katen Doe</a></li>
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
									<!-- post -->
									<div class="post post-carousel">
										<div class="thumb rounded">
											<a href="category.html" class="category-badge position-absolute">Trending</a>
											<a href="blog-single.html">
												<div class="inner">
													<img src="{{ asset('frontend') }}/images/widgets/widget-carousel-2.jpg" alt="post-title" />
												</div>
											</a>
										</div>
										<h5 class="post-title mb-0 mt-4"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h5>
										<ul class="meta list-inline mt-2 mb-0">
											<li class="list-inline-item"><a href="#">Katen Doe</a></li>
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
									<!-- post -->
									<div class="post post-carousel">
										<div class="thumb rounded">
											<a href="category.html" class="category-badge position-absolute">How to</a>
											<a href="blog-single.html">
												<div class="inner">
													<img src="{{ asset('frontend') }}/images/widgets/widget-carousel-1.jpg" alt="post-title" />
												</div>
											</a>
										</div>
										<h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
										<ul class="meta list-inline mt-2 mb-0">
											<li class="list-inline-item"><a href="#">Katen Doe</a></li>
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- carousel arrows -->
								<div class="slick-arrows-bot">
									<button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
									<button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
								</div>
							</div>		
						</div>

						<!-- widget advertisement -->
						<div class="widget no-container rounded text-md-center">
							<span class="ads-title">- Sponsored Ad -</span>
							<a href="#" class="widget-ads">
								<img src="{{ asset('frontend') }}/images/ads/ad-360.png" alt="Advertisement" />	
							</a>
						</div>

						<!-- widget tags -->
						{{-- <div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Tag Clouds</h3>
								<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<a href="#" class="tag">#Trending</a>
								<a href="#" class="tag">#Video</a>
								<a href="#" class="tag">#Featured</a>
								<a href="#" class="tag">#Gallery</a>
								<a href="#" class="tag">#Celebrities</a>
							</div>		
						</div> --}}

					</div>

				</div>

			</div>

		</div>
	</section>

	<!-- instagram feed -->
	<div class="instagram">
		<div class="container-xl">
			<!-- button -->
			<a href="#" class="btn btn-default btn-instagram">@Katen on Instagram</a>
			<!-- images -->
			<div class="instagram-feed d-flex flex-wrap">
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-1.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-2.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-3.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-4.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-5.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-6.jpg" alt="insta-title" />
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection