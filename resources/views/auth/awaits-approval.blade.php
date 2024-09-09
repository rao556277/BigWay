@extends('layouts.app')

@section('content')
<section class="relative w-full h-full py-40 min-h-screen">
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-sm font-bold">
                                {{ __('Your account is awaiting administrator approval') }}
                            </h6>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        {{ __('If you have any questions you can reach us via email:') }}
                        <a href="mailto:{{ config('mail.from.address') }}" class="inline-block p-0 m-0 text-lightBlue-500 hover:underline align-baseline">{{ config('mail.from.address') }}</a>
                    </div>
                </div>

                <div class="flex flex-wrap mt-6">
                    <div class="w-full text-right">
                        @if(Route::has('logout'))
                            <form class="inline" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="text-blueGray-200">
                                    <small>{{ __('global.logout') }}</small>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection