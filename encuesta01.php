<div class="binduz-er-blog-post-form">
  <form action="enviar_encuesta01.php" method="post">
    <div class="binduz-er-blog-post-title">
      <p>La siguiente encuesta, busca conocer el grado de satisfacción de los usuarios sobre los diferentes trámites inscritos y consultados en el Sistema Único de Tramites- SUIT. </p>
    </div>
    <div class="row">
	  <div class=" col-lg-12">
        <div class="binduz-er-input-box">
		  <h5>Indique el trámite o servicio realizado</h5>
        </div>
      </div>
      <div class=" col-lg-6">
		  <label><input type="checkbox" id="tr1" name="tramite" value="Asignación de cita médica especializada" /> Asignación de cita médica especializada</label><br />
			<label><input type="checkbox" id="tr2" name="tramite" value="Atención inicial de urgencia" /> Atención inicial de urgencia</label><br />
			<label><input type="checkbox" id="tr3" name="tramite" value="Certificado de defunción" /> Certificado de defunción</label><br />
			<label><input type="checkbox" id="tr4" name="tramite" value="Certificado de nacido vivo" /> Certificado de nacido vivo</label><br />
			<label><input type="checkbox" id="tr5" name="tramite" value="Examen de laboratorio clínico" /> Examen de laboratorio clínico</label><br />
      </div>
		<div class=" col-lg-6">
			<label><input type="checkbox" id="tr6" name="tramite" value="Historia clínica" /> Historia clínica</label><br />
			<label><input type="checkbox" id="tr7" name="tramite" value="Radiología e imágenes diagnósticas" /> Radiología e imágenes diagnósticas</label><br />
			<label><input type="checkbox" id="tr8" name="tramite" value="Terapia de habilitación o rehabilitación" /> Terapia de habilitación o rehabilitación</label><br />
			<label><input type="checkbox" id="tr9" name="tramite" value="Certificado de paz y salvo" /> Certificado de paz y salvo</label><br />
		</div>
		<hr>
	  <div class=" col-lg-12">
		  <h5>¿La información para realizar el trámite (pasos a seguir, requisitos, etc) o para solicitar el servicio fue clara y completa? </h5>
          <label><input type="radio" name="info_clara" id="info_si" value="SI"> SI</label>
		  <label><input type="radio" name="info_clara" id="info_no" value="NO"> NO</label>
      </div>
		<hr>
	  <div class=" col-lg-12">
		  <h5>¿El acceso para realizar el trámite o solicitar el servicio fue fácil y adecuado?</h5>
          <label><input type="radio" name="acceso_facil" id="acceso_si" value="SI"> SI</label>
		  <label><input type="radio" name="acceso_facil" id="acceso_no" value="NO"> NO</label>
      </div>
		<hr>
	  <div class=" col-lg-12">
		  <h5>¿Califique su grado de satisfacción respecto al trámites o servicios prestados en general?</h5>
          <label><input type="radio" name="satisfaccion" id="satisfaccion_ex" value="Excelente"> Excelente</label>
		  <label><input type="radio" name="satisfaccion" id="satisfaccion_muy_buena" value="Muy buena"> Muy buena</label>
		  <label><input type="radio" name="satisfaccion" id="satisfaccion_buena" value="Buena"> Buena</label>
		  <label><input type="radio" name="satisfaccion" id="satisfaccion_regular" value="Regular"> Regular</label>
      </div>
		<hr>
	  <div class=" col-lg-12">
        <h5>¿Qué aspectos considera se deben mejorar respecto a los trámites y servicios prestados por la E.S.E. Hospital Universitario San Rafael de Tunja?</h5>
      </div>
	  <div class=" col-lg-12">
        <div class="binduz-er-input-box">
          <textarea name="mejorar" id="mejorar" cols="30" rows="5" placeholder="Mensaje"></textarea>
        </div>
      </div>
      <div class=" col-lg-12">
        <div class="binduz-er-input-box text-end mt-15">
          <div class="g-recaptcha" data-sitekey="6Lf5dkcfAAAAAP3Dq_mTVhRHYIOk7h3mWIiqxBl3"></div>
          <input type="submit" value="ENVIAR" class="binduz-er-main-btn">
        </div>
      </div>
    </div>
  </form>
</div>
