
<!-- Modal -->
<div class="modal fade" id="{{$idModal}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{$modalTitle}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="{{$idForm??'AForm'}}" action={{$route}} method="post">
                @csrf
            <div class="modal-body">
                    {{$content}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>

        </div>
    </div>
</div>
