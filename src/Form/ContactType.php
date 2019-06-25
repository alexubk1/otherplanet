<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
/**
 * Contact Type
 *
 * @category ContactType
 * @package  Type
 */
class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param FormBuilderInterface $builder The formBuilderInterface form
     * @param array                $options the attribute array
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name', TextType::class,
                array('attr' => array('placeholder' => 'Your name'),
                    'constraints' => array(
                        new NotBlank(
                            array
                            ("message" => "Let me your name")
                        ),
                    )
                )
            )
            ->add(
                'email', EmailType::class,
                array('attr' => array('placeholder' => 'Your email'),
                    'constraints' => array(
                        new NotBlank(array("message" => "Let me your email")),
                        new Email(array("message" => "Your email is not valid")),
                    )
                ))
            ->add(
                'subject', TextType::class,
                array('attr' => array('placeholder' => 'Subject'),
                    'constraints' => array(
                        new NotBlank(
                            array
                            ("message" => "Let me a subject")
                        ),
                    )
                )
            )
            ->add(
                'message', TextareaType::class,
                array('attr' => array('placeholder' => 'Tell a great story...'),
                    'constraints' => array(
                        new NotBlank(
                            array("message" => "Tell me a story")
                        ),
                    )
                )
            );
    }
    /**
     * {@inheritdoc}
     *
     * @param OptionsResolver $resolver The optionResolver class
     *
     * @return void
     */
    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'error_bubbling' => true
            )
        );
    }
    /**
     * {@inheritdoc}
     *
     * @return null
     */
    public function getName()
    {
        return 'contact_form';
    }
}