<h2>PET for FRIEND</h1>
<h2><strong>Developers</strong></h2>
<ul>
    <li>Anderson Teixeira Leal
    <li>Luccas Aparecido Pedroso de Assis
</ul>
<h2><strong>Proposta</strong></h2>
<p>Com base nos dados da pesquisa realizada pelo Instituto Pet Brasil, onde foram levantados que atualmente existem mais de 170 mil animais aguardando por um lar em ONGs e abrigos espalhados por todo o Brasil para serem adotados, dos quais alguns deles possuem algum tipo de deficiência, o que acaba acarretando em o dobro do tempo para adoção em relação aos demais, sendo que 46% deles se encontram na região Sudeste.

Considerando as necessidades dos animais, também foi identificado um grupo da população onde a adoção de um animal pode ser extremamente benéfica, sendo esses os grupos formados por pessoas idosas, com quadro de depressão e portadores de necessidades especiais.

Surge então a necessidade da criação de uma ferramenta web, facilitadora, destinada a melhoria e agilidade no processo de adoção e maior divulgação para o público alvo. Um sistema que tenha como finalidade proporcionar uma ligação entre os animais disponíveis para adoção e possuem alguma limitação física/mental ou em idade mais avançada, com os adotantes em busca de um pet, ou até mesmo para pessoas interessadas em apadrinhar um animal, visto que estes padrinhos às vezes não possuem disponibilidade de tempo e/ou local para os cuidados necessários.

Nessa ferramenta será possível apadrinhar um animal, de forma virtual, onde esse(a) padrinho/madrinha se torne um benfeitor para o pet, que por sua vez continuará residindo em um abrigo ou em um lar temporário até que consiga um lar definitivo. O(a) padrinho/madrinha se responsabilizará por manter acompanhamento virtual do pet, colaborando na divulgação de sua disponibilidade para adoção por meio de imagens, vídeos, textos estimuladores e compartilhamento nas redes sociais, além de poder fazer visitas e passeios com o pet apadrinhado, ou até mesmo apadrinhando por meio de recursos financeiros.</p>
<h2><strong>Público Alvo</strong></h2>
<p>ONGs, abrigos, pessoas interessadas em disponibilizar animais para adoção, pessoas que estejam dispostas a oferecer lares temporários para animais, pessoas interessadas em adotar um animal e até mesmo pessoas interessadas em apadrinhar algum animal.</p>
<h2><strong>Tecnologias utilizadas</strong></h2>
<ul>
    <li>AXURE RP 9</li><br>
    <li>MySQL Workbench 8.0 :
        <ul type="circle">
            <li>Modelo conceitual</li>
            <li>Script SQL</li>
            <li>Script SQL - Adição de dados</li>
        </ul>
    </li><br>
    <li>Xampp Version 7.4.9 : 
		<ul type="circle">
			<li>Servidor HTTP Apache Version 2.4</li>
			<li>Mysql</li>
			<li>PHP 7.4.9</li>
			<li>HTML5</li>
		</ul>
    </li><br>
</ul>
<h2><strong>Regras de uso do git</strong></h2>
<ul>
    <li>Todos os commits devem ser escritos de maneira clara e objetiva, sem enrolações.</li>
    <li>Todos os commits devem conter informações sobre o que foi adicionado/alterado/removido.</li>
    <li>Todos os commits devem conter em seus finais <strong>#número_issue</strong> (p. ex. "#1") que refere a sua respectiva tarefa.</li>
    <li>Caso o arquivo/documento seja totalmente modificado o commit deve informar que ele foi reestruturado e o motivo da reestruturação.</li>
    <li>Para cada tarefa deve ser criada uma inssue e ser referenciada com seu requisito ou release.</li>
    <li>Toda tarefa deve ser executada com base em sua issue e essa issue deverá ser atualizada conforme seu desenvolvimento.</li>
    <ul type="circle">
        <li>To do</li>
        <li>In progress</li>
        <li>Done</li>
    </ul>
    <li>Todas as inssues devem ser utilizadas e quando uma tarefa estiver sendo executada, sua inssue deve estar na coluna de desenvolvimento (In progress).</li>
    <li>Toda tarefa finalizada deve ser arrastada para coluna done e fechada "Close issue".</li>
    <li>Caso uma tarefa já finalizada prescise de alterações a inssue deve ser reaberta e então utilizada.</li>
</ul>
<h2><strong>Definições de pastas</strong></h2>
<p>A armazenagem de todos os arquivos referente projeto, tais como códigos, digagramas, imagens e documentos variados, deverá seguir as seguinte regras, de forma a facilitar as suas localizações, colaborando assim para que o projeto fique organizado e de fácil compreensão.</p>
<ul>
    <li>Os códigos deverão ser armazenados na pasta <u>src</u>, separadamente em suas respetcivas subpastas, conforme já estão subdivididos no Diagrama de Classes da seguinte forma:
    <ul style="circle">
        <li>Controller</li>
        <li>Model</li>
        <li>View</li>
        <li>Persistence</li>
    </ul>
    <li>Para a armazenagem dos demais documentos deve-se procurar agrupá-los considerando suas relações.</li>
</ul>
<h2><strong>.gitignore</strong></h2>
<p>Neste arquivo deverão ser adiconados todos aqueles arquivos indesejados, os quais sejam necessários que fiquem totalmente invisíveis ao Git. Abaixo segue alguns exemplos de arquivos que dever ser ignorados</p>
<ul>
    <li>Arquivos compilados, como .so e .class;</li>
    <li>Arquivos temporários de build;</li>
    <li>Arquivos privados locais (como por exemplo, arquivos que guardam dados secretos no container de injeção de dependências);</li>
    <li>Arquivos pessoais salvos pela IDE;</li>
</ul>