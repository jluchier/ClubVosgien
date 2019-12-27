@if(session("success"))
    <div class="w3-white w3-panel w3-leftbar w3-border-green">
        <p class="w3-text-green">
            {{ session("success") }}
        </p>
    </div>
@endif
