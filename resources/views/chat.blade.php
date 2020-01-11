@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">chatroom</div>

                    <div class="panel-body">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form
                                v-on:messagesent="addMessage"
                                :user="{{ Auth::user() }}"
                        ></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!--div class="container">
    <div class="row justify-content-center">
      <chat-messages></chat-messages>

        <chat-form></chat-form>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chats</div>
                <div class="card-body">
                   Chats
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                   Users
                </div>
            </div>
        </div>
    </div>
</div-->
