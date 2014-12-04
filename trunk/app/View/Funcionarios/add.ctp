<div class="funcionarios form">
<?php echo $this->Form->create('Funcionario'); ?>
    <fieldset>
        <legend><?php echo __('Adicionar funcionário'); ?></legend>
        <?php
            echo $this->Form->input('nome', array(
                'label' => 'Nome'
            ));
            echo $this->Form->input('dataNascimento', array(
                'label' => 'Data de nascimento'
            ));
            echo $this->Form->input('email', array(
                'label' => 'E-mail',
                'type' => 'email'
            ));
            echo $this->Form->input('telefone', array(
                'label' => 'Telefone'
            ));
            echo $this->Form->input('username', array(
                'label' => 'Nome de usuário'
            ));
            echo $this->Form->input('password', array(
                'label' => 'Senha'
            ));
            echo $this->Form->input('supervisor', array(
                'label' => 'Supervisor'
            ));
            echo $this->Form->input('area', array(
		'label' => 'Área',
                'options' => array(
                    'Direito', 'Psicologia', 'Assistência Social')
            ));
            // não tem dataEntrada nem dataSaída; são definidas automaticamente.
            // uma alternativa seria botar um input pro dataEntrada, com a data
            // atual sendo o valor default, pra que eles possam especificar
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>