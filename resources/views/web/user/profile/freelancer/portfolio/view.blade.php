@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container user-profile">
        <div class="inner">
            <div class="row">
                <div class="col">
                    <div class="portfolio-view">
                        <div class="portfolio-view-top">
                            <div class="row">
                                <div class="col-md-4 col-sm-3 col-12 portfolio-view-top-left">
                                    <img class="img-fluid" src="{{ asset($portfolio->cover) }}">
                                </div>
                                <div class="col-md-8 col-sm-9 col-12 portfolio-view-top-right">
                                    <div class="portfolio-view-top-right-title">
                                        <h2>{{ $portfolio->description['ru']['title'] }}</h2>
                                        <ul class="portfolio-view-top-right-ul mt-3">
                                            <li>
                                                <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id }}" class="link-fr">
                                                    <img class="img-fluid rounded-circle"  src="{{ asset($freelancer->avatar['50x50']) }}" height="25" width="25">
                                                    <h6 class="d-inline-block"><span>{{ $freelancer->first_name }} {{ $freelancer->last_name}}</span></h6>
                                                </a>
                                            </li>
                                            <li>
                                                <h6 class="d-inline-block">
                                                <span class="jam jam-eye"></span><span>{{ $portfolio->views }}</span></h6>
                                            </li>
                                            <li>
                                                <h6 class="d-inline-block">
                                                <span class="jam jam-clock"></span> <span>{{ $portfolio->created_at->diffForHumans() }}</span></h6>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="portfolio-view-top-right-tags">
                                        @foreach($tags as $tag)
                                            <li>
                                                <span>{{$tag}}</span>
                                                <span class="jam jam-circle-f"></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="portfolio-view-top-right-desc">
                                        <article>{{ $portfolio->description['ru']['desc'] }}</article>
                                    </div>
                                    <ul class="portfolio-view-top-right-links">

                                        @if(($portfolio->links['behance'] || $portfolio->links['dribble']) || ((isset($portfolio->links['dribble'])) || isset($portfolio->links['other']['link'])))
                                        <p>Ссылки на других проектах:</p>
                                        @else
                                        <p></p>
                                        @endif
                                        @if(isset($portfolio->links['behance']))
                                        <li>
                                            <a href="{{ $portfolio->links['behance'] }}" target="_blank">
                                                <div class="links-item">
                                                    <svg class="behance" width="20" height="20" viewBox="0 0 200 80" xmlns="http://www.w3.org/2000/svg"><path d="M59.193 0c5.99 0 11.451.528 16.384 1.586 4.933 1.057 9.161 2.791 12.684 5.196 3.523 2.408 6.254 5.609 8.192 9.603 1.938 3.994 2.907 8.926 2.907 14.798 0 6.343-1.439 11.628-4.316 15.855-2.879 4.228-7.135 7.692-12.772 10.394 7.751 2.232 13.535 6.139 17.353 11.715 3.814 5.58 5.727 12.305 5.727 20.172 0 6.342-1.233 11.834-3.701 16.474-2.465 4.641-5.785 8.428-9.952 11.36-4.17 2.938-8.927 5.109-14.27 6.521a64.387 64.387 0 0 1-16.472 2.112H0V0h59.193zM55.67 50.915c4.933 0 8.984-1.174 12.156-3.524 3.171-2.348 4.756-6.166 4.756-11.451 0-2.935-.528-5.344-1.585-7.223-1.057-1.878-2.466-3.349-4.228-4.404-1.762-1.058-3.788-1.789-6.078-2.203a40.436 40.436 0 0 0-7.135-.616H27.659v29.422H55.67zm1.585 53.378c2.7 0 5.285-.265 7.751-.793 2.466-.529 4.638-1.41 6.519-2.644 1.877-1.231 3.375-2.906 4.492-5.021 1.115-2.113 1.673-4.814 1.673-8.104 0-6.457-1.822-11.067-5.461-13.828-3.642-2.76-8.457-4.141-14.446-4.141H27.659v34.529l29.596.002zM140.159 101.651c3.758 3.644 9.161 5.461 16.208 5.461 5.048 0 9.395-1.26 13.035-3.787 3.641-2.522 5.873-5.196 6.695-8.016h22.021c-3.522 10.922-8.927 18.734-16.207 23.43-7.284 4.699-16.093 7.047-26.427 7.047-7.164 0-13.625-1.145-19.379-3.436-5.756-2.289-10.631-5.549-14.621-9.777-3.994-4.227-7.077-9.274-9.25-15.149-2.174-5.871-3.258-12.332-3.258-19.379 0-6.81 1.113-13.152 3.347-19.025 2.229-5.871 5.399-10.951 9.514-15.24 4.108-4.285 9.013-7.662 14.71-10.129 5.695-2.467 12.008-3.699 18.938-3.699 7.752 0 14.504 1.497 20.261 4.492 5.753 2.994 10.481 7.021 14.182 12.067 3.699 5.051 6.369 10.807 8.017 17.264 1.644 6.461 2.229 13.213 1.762 20.26h-65.712c.351 8.102 2.403 13.977 6.164 17.616zm28.275-47.918c-2.994-3.287-7.547-4.933-13.652-4.933-3.994 0-7.311.677-9.953 2.026-2.643 1.353-4.758 3.023-6.344 5.021-1.584 1.998-2.702 4.113-3.346 6.342-.647 2.232-1.029 4.229-1.146 5.99h40.695c-1.174-6.343-3.258-11.157-6.254-14.446zM129.721 6.387h50.846v14.098h-50.846z"/></svg>
                                                </div>
                                                <div class="links-item">
                                                    <span>Behance</span>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if(isset($portfolio->links['dribble']))
                                        <li>
                                            <a href="{{ $portfolio->links['dribble'] }}" target="_blank">
                                                <div class="links-item">
                                                    <svg class="dribble" width="20" height="20" viewBox="0 0 350 200" xmlns="http://www.w3.org/2000/svg"><path d="M128 8.5c66 0 119.4 53.4 119.4 119.3S194 247.2 128 247.2 8.6 193.8 8.6 127.9 62 8.5 128 8.5z" fill="#E74D89"/><path d="M128 255.7c-70.6 0-128-57.3-128-127.8C0 57.3 57.4 0 128 0s128 57.3 128 127.8-57.4 127.9-128 127.9zm107.9-110.4c-3.7-1.2-33.8-10.1-68.1-4.7 14.3 39.2 20.1 71.2 21.2 77.8 24.6-16.5 42.1-42.7 46.9-73.1zm-65.2 83.2c-1.6-9.6-8-43-23.3-82.8-.2.1-.5.2-.7.2-61.7 21.5-83.8 64.2-85.8 68.2 18.5 14.4 41.8 23 67.1 23 15.1.1 29.6-3 42.7-8.6zM46.8 201c2.5-4.2 32.5-53.8 88.9-72.1 1.4-.5 2.9-.9 4.3-1.3-2.7-6.2-5.7-12.4-8.9-18.5-54.6 16.3-107.6 15.6-112.4 15.5 0 1.1-.1 2.2-.1 3.3.1 28.1 10.7 53.7 28.2 73.1zM21 105.6c4.9.1 49.9.3 101.1-13.3C104 60.1 84.4 33.1 81.6 29.2 50.9 43.6 28.1 71.8 21 105.6zm81.4-83.8c3 4 22.9 31 40.8 63.9 38.9-14.6 55.3-36.6 57.3-39.4-19.3-17.1-44.7-27.5-72.5-27.5-8.8 0-17.4 1.1-25.6 3zm110.2 37.1c-2.3 3.1-20.6 26.6-61 43.1 2.5 5.2 5 10.5 7.3 15.8.8 1.9 1.6 3.8 2.4 5.6 36.4-4.6 72.5 2.8 76.1 3.5-.3-25.7-9.5-49.4-24.8-68z" /></svg>
                                                </div>
                                                <div class="links-item">
                                                    <span>Dribble</span>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if(isset($portfolio->links['github']))
                                        <li>
                                            <a href="{{ $portfolio->links['github'] }}" target="_blank">
                                                <div class="links-item">
                                                    <span class="jam jam-github-circle"></span>
                                                </div>
                                                <div class="links-item">
                                                    <span>Github</span>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if(isset($portfolio->links['other']['link']))
                                        <li>
                                            <a href="{{ $portfolio->links['other']['link'] }}" target="_blank">
                                                <div class="links-item">
                                                    <span class="jam jam-link"></span>
                                                </div>
                                                <div class="links-item">
                                                    <span>{{ $portfolio->links['other']['title'] }}</span>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-view-middle">
                            @if(isset($portfolio->files['fulls']))
                            <ul class="portfolio-view-middle-ul">
                                <li>
                                    <h6 class="mb-3 d-inline-block">
                                    <span class="jam jam-link"></span> <span>{{ count($portfolio->files['fulls']) }} файла</span></h6>
                                </li>                                
                            </ul>
                            @endif
                            <div class="d-block">
                                <div class="row">
                                    @if($portfolio->files['thumbs'])
                                    @foreach($portfolio->files['thumbs'] as $file)
                                        <div class="col-sm-1 col-3">
                                            <img src="{{ asset($file['file'])}}" class="img-fluid mb-4" alt="">
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-view-bottom mt-4">
                            <div class="text-center mb-4">
                                @if(isset($portfolio->files['fulls']))
                                @foreach($portfolio->files['fulls'] as $file)
                                    <img src="{{ asset($file['file'])}}" class="img-fluid mb-4" alt="">
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection