
      @extends("layout")

      @section("content")

         <form action="" method="POST">
             {{--pour utiliser post il faut mettre un input de type hidden nomé _token pour la validation csrf--}}
             @csrf
              <div class="form-group">
                  <label for="title"> Titre</label>
                  <input type="text" class="form-control" @error("title") is-invalid @enderror  name="title">
                  @error('title')
                  <div class="invalid-feedback">
                      {{message}}
                  </div>
                  @enderror
              </div>
             <div class="form-group">
                 <label for="contenu"> Contenu</label>
                 <input type="text" class="form-control" @error("contenu") is-invalid @enderror name="contenu">
                 @error('title')
                 <div class="invalid-feedback">
                     {{message}}
                 </div>
                 @enderror
             </div>
              <button type="submit" class="btn btn-primary">Envoyer</button>
          </form>
      @endsection


