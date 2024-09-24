<!--  -->
<div class="pai-container">
  <div class="well">
    <?= $this->Form->create(null, ['url' => ['controller' => 'afastamentos', 'action' => 'index'], 'class' => 'arrumar']); ?>
      <div class="dropdown-container">
        <label for="defensor-dropdown" class="dropdown-label">NOME DO DEFENSOR</label>
        <div class="dropdown">
          <?= $this->Form->select('nome_defensor', 
            ['' => 'Selecione'] + array_map(function($pessoa) {
              return [h($pessoa['Afastamento']['nome_funcionario']) => h($pessoa['Afastamento']['nome_funcionario'])];
            }, $pessoas), 
            ['id' => 'defensor-dropdown']
          ); ?>
        </div>
      </div>
      <div class="dropdown-container">
        <label for="comarca-dropdown" class="dropdown-label">COMARCA</label>
        <div class="dropdown">
          <?= $this->Form->select('comarca', 
            ['' => 'Selecione'] + [
              'INV__1001' => 'INV__1001',
              'INV__1002' => 'INV__1002',
              'INV__1003' => 'INV__1003',
              'INV__1004' => 'INV__1004',
              'INV__1005' => 'INV__1005'
            ],
            ['id' => 'comarca-dropdown']
          ); ?>
        </div>
      </div>
      <div class="buttons-container">
        <?= $this->Form->button('Pesquisar', ['type' => 'submit', 'class' => 'btn-pesquisar']); ?>
        <?= $this->Form->button('Limpar', ['type' => 'reset', 'class' => 'btn-limpar']); ?>
      </div>
    <?= $this->Form->end(); ?>
  </div>
</div>

<table>
  <thead>
    <tr>
      <th>Data Cadastro</th>
      <th>Nome do Defensor</th>
      <th>Comarca</th>
      <th>Unidade</th>
      <th>Tipo De Afastamento</th>
      <th>Data do Afastamento</th>
      <th>Data Retificada</th>
      <th>Opções</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($afastamentos as $afastamento): ?>
      <tr>
        <td><?php echo date('d/m/Y', strtotime(h($afastamento['Afastamento']['data_afastamento']))); ?></td>
        <td>
          <p><?php echo h($afastamento['Afastamento']['nome_funcionario']); ?></p>
        </td>
        <td><?php echo h($afastamento['Afastamento']['cidade']); ?></td>
        <td>
          <p><?php echo h($afastamento['Afastamento']['local_afastamento']); ?></p>
        </td>
        <td><?php echo h($afastamento['Afastamento']['tipo_afastamento']); ?></td>

        <td class="amount">
          <p class="status status-paid">De: <?php echo date('d/m/Y', strtotime(h($afastamento['Afastamento']['periodo_inicio']))); ?></p>
          <p class="status status-paid">Até: <?php echo date('d/m/Y', strtotime(h($afastamento['Afastamento']['periodo_fim']))); ?></p>

        </td>

        <td>
          <?php if ($afastamento['Afastamento']['motivo'] == 'SAÚDE'): ?>
            <p class="status status-paid">Paid</p>
          <?php elseif ($afastamento['Afastamento']['motivo'] == 'PENDENTE'): ?>
            <p class="status status-pending">Pending</p>
          <?php else: ?>
            <p class="status status-unpaid">Unpaid</p>
          <?php endif; ?>
        </td>
        <td>
          <div class="arrumar_icone">
            <button onclick="editItem(${index})"><i class='bx bx-edit'></i></button>
            <button onclick="deleteItem(${index})"><i class='bx bx-trash'></i></button>
            <button onclick="deleteItem(${index})"><i class='bx bx-trash'></i></button>
            <button onclick="deleteItem(${index})"><i class='bx bx-trash'></i></button>
            <button onclick="deleteItem(${index})"><i class='bx bx-trash'></i></button>

          </div>

        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php

// Shows the page numbers
echo $this->Paginator->numbers();

// Shows the next and previous links
echo $this->Paginator->prev(
  '« Previous',
  null,
  null,
  array('class' => 'disabled')
);
echo $this->Paginator->next(
  'Next »',
  null,
  null,
  array('class' => 'disabled')
);

// prints X of Y, where X is current page and Y is number of pages
echo $this->Paginator->counter();
?>
</div>


