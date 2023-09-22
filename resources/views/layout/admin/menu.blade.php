<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
            <a href="/"  class=" nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
            </a>

        </li>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Area Pedagógica</span>
        </p>
        <li class="nav-item dropdown">
            <a href="#aluno-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Aluno</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="aluno-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.aluno.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('admin.aluno.index') }}"><span class="ml-1 item-text">Listar</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#professor-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Professor</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="professor-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.professor.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('admin.professor.index') }}"><span class="ml-1 item-text">Listar</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#curso-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Curso</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="curso-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.curso.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('admin.curso.index') }}"><span class="ml-1 item-text">Listar</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#classe-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Classe</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="classe-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.classe.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('admin.classe.index') }}"><span class="ml-1 item-text">Listar</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#turma-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Turma</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="turma-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.turma.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('admin.turma.index') }}"><span class="ml-1 item-text">Listar</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#disciplina-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Disciplina</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="disciplina-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.disciplina.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('admin.disciplina.index') }}"><span class="ml-1 item-text">Listar</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#matricula-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Matriculas</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="matricula-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.matricula.create') }}"><span class="ml-1 item-text">Matricular</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('admin.matricula.index') }}"><span class="ml-1 item-text">Listar</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#ano-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Ano Lectivo</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="ano-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.ano.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('admin.ano.index') }}"><span class="ml-1 item-text">Listar</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#avaliacao-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Notas</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="avaliacao-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.avaliacao.prova') }}"><span class="ml-1 item-text">Lançar Notas</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.avaliacao.verProva') }}"><span class="ml-1 item-text">Consultar Notas</span></a>
                </li>
                <!--<li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.avaliacao.avaliar') }}"><span class="ml-1 item-text">Avaliações continuas</span></a>
                </li>-->
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#frequencia-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Frequencias</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="frequencia-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.frequencia.presenca') }}"><span class="ml-1 item-text">Registrar presença</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.frequencia.index') }}"><span class="ml-1 item-text">Consultar lista de  presença</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#falta-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Falta</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="falta-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.falta.justificar') }}"><span class="ml-1 item-text">Justificar Faltas</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#verfalta-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <span class="ml-3 item-text">Ver Falta</span><span class="sr-only">(current)</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="verfalta-collapse">
                            <li class="nav-item active">
                                <a class="nav-link pl-3" href="{{ route('admin.falta.verTurmaFalta') }}"><span class="ml-1 item-text">Turma</span></a>
                            </li>
                            <li>
                                <a class="nav-link pl-3" href="{{ route('admin.falta.verAlunoFalta') }}"><span class="ml-1 item-text">Aluno</span></a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#propina-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Propina</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="propina-collapse">
                <ul class="collapse list-unstyled pl-4 w-100" id="propina-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.propina.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.propina.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </ul>
        </li>
    </ul>




    </nav>
  </aside>
