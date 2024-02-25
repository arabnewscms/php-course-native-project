<?php  if(!empty($url)):
    
    $rand = md5(rand(000, 999));
    ?>
<!-- Button trigger modal -->
 
    <a href="#"  data-bs-toggle="modal" data-bs-target="#deleteForm{{$rand}}">
        <i class="fa fa-trash"></i>
    </a>


<!-- Modal -->
<div class="modal fade" id="deleteForm{{$rand}}" tabindex="-1" aria-labelledby="deleteFormLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
            <form method="post" action="{{$url}}">
                <input type="hidden" name="_method" value="post" />
                <div class="alert alert-danger">
                    <h5>{{ trans('admin.delete_message') }}</h5>
                </div>  
               <button type="submit" class="btn btn-danger">{{ trans('admin.delete') }}</button>   
               <button type="button" class="btn btn-success" data-bs-dismiss="modal">{{ trans('admin.cancel') }}</button>   
            </form>
				 
			</div>
		</div>
	</div>
</div>
<?php endif; ?>