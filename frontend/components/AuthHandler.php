<?php
namespace frontend\components;

use Yii;
use yii\authclient\ClientInterface;
use common\models\User;

/**
 * AuthHandler handles successful authentication via Yii auth component
 */
class AuthHandler
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function login()
    {
        $email = null;
        $attrs = $this->client->userAttributes;
        switch ($this->client->name) {
            case 'vkontakte':
                $email = strtolower($attrs['email']);
                break;
            case 'facebook':
                $email = $attrs['email'];
                break;
            case 'twitter':
                $email = $attrs['email'];
                break;
            case 'yandex':
                $email = $attrs['default_email'];
                break;
            case 'google':
                $email = $attrs['emails'][0]['value'];
                break;
            default:
                break;
        }
        if ($email) {
            $user = User::findFrontendUser($email);
            if ($user) {
                return Yii::$app->user->login($user);
            } else {
                Yii::$app->session->setFlash('error', 'Пользователь с таким Email не найден. Зарегистрируйтесь.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Не удалось получить Email. Авторизуйтесь вручную.');
        }
        return false;
    }

    public function signup()
    {
        $email = null;
        $name = null;
        $attrs = $this->client->userAttributes;
        switch ($this->client->name) {
            case 'vkontakte':
                $email = strtolower($attrs['email']);
                $name = $attrs['last_name'].' '.$attrs['first_name'];
                break;
            case 'facebook':
                $email = $attrs['email'];
                $name = $attrs['name'];
                break;
            case 'twitter':
                $email = $attrs['email'];
                $name = $attrs['name'];
                break;
            case 'yandex':
                $email = $attrs['default_email'];
                $name = $attrs['display_name'];
                break;
            case 'google':
                $email = $attrs['emails'][0]['value'];
                $name = $attrs['displayName'];
                break;
            default:
                break;
        }
        if ($email) {
            $user = new User();
            $user->email = $email;
            $user->name = $name;
            $user->role = User::ROLE_USER;
            $user->status = User::STATUS_INACTIVE;
			// TODO добавить аватарку, тип соц. сети и id в ней
            $password = Yii::$app->security->generateRandomString(8);
            $user->setPassword($password);
            $user->generateAuthKey();
            if ($user->save()) {
                // TODO добавить рассылку на почту
                Yii::$app->session->setFlash('success', 'Для завершения регистрации пройдите по ссылке отправленной на e-mail.');
                return true;
            } else {
                Yii::$app->session->setFlash('error', 'Пользователь с таким Email уже существует. Авторизуйтесь.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Не удалось получить Email. Зарегистрируйтесь вручную.');
        }
        return false;
    }
}