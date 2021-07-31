{{-- user info and avatar --}}
<div class="avatar av-l"></div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
{{--     <a href="#" class="default"><i class="fas fa-camera"></i> default</a>--}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Supprimer Conversation</a>
{{--    <a href="#" class="danger block-user"><i class="fas fa-trash-alt"></i> Bloquer utilisateur</a>--}}
</div>

<div class="messenger-infoView-btns">
    {{--     <a href="#" class="default"><i class="fas fa-camera"></i> default</a>--}}
{{--    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Supprimer Conversation</a>--}}
    <a href="#" class="danger block-user"></i> Bloquer utilisateur</a>
</div>


{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">shared photos</p>
    <div class="shared-photos-list"></div>
</div>
