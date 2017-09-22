@extends('admin.layout')



@section('content')

        <section>

                        <h1>Reset hesla pro účet {{ Auth::user()->name }}</h1>

                        <form action="{{ route('admin.resetPassword', Auth::user()->id) }}" method="post">
                            {!! csrf_field() !!}

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Nové heslo">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password_check" placeholder="Zadejte znovu pro kontrolu">
                                </div>

                                <div class="form-group">
                                    <div class="text-left">
                                        <input type="submit" name="submit" value="Potvrdit" class="btn">
                                    </div>
                                </div>

                        </form>

        </section>


@endsection


