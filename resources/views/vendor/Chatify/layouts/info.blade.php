{{-- user info and avatar --}}
<div class="avatar av-l"></div>
<p class="info-name">{{ config('chatify.name') }}</p>
{{--<div class="messenger-infoView-btns">--}}
{{--    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Supprimer Conversation</a>--}}
{{--</div>--}}

<div class="messenger-infoView-btns">
    <a href="#" class="danger block-user"><i class="fas fa-user-slash"></i> Bloquer cet utilisateur</a>
</div>

<div class="messenger-infoView-btns">
    <a href="#" class="danger report-user"><i class="fas fa-exclamation-triangle"></i> signaler cet utilisateur</a>
</div>


{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">photos partagées</p>
    <div class="shared-photos-list"></div>
</div>
