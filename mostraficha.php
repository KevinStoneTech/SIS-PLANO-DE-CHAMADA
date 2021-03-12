<?php
include "conexao.php";
$id = base64_decode(filter_input(INPUT_GET, "out"));
$p2 = conectar2("membros");
$psqficha = $p2->prepare("SELECT * FROM usuarios WHERE id = :id");
$psqficha->bindParam(':id', $id);
$psqficha->execute();
$mficha = $psqficha->fetchAll(PDO::FETCH_ASSOC);
$m_ficha = $mficha[0];
$nomecompleto = $m_ficha['nomecompleto'];
?>
<!-- Modal -->

<div class="modal-content">
    <div class="modal-header state modal-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-large-label">Dados do <?php echo($nomecompleto); ?></h4>
    </div>
    <div class="modal-body">
        <p>Nome: <?php echo($m_ficha['nomecompleto']) ?></p>
    </div>
    <div class="modal-footer">
    </div>
</div>