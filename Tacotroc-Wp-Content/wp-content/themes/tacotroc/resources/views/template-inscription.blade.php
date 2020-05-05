{{-- 
    Template Name: inscription
    --}}

    @extends('layouts.account')

    @section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection













