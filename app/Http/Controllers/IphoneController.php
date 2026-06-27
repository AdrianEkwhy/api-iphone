<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iphone;

/**
 * @OA\Info(
 *     title="API Sistem Penjualan iPhone",
 *     version="1.0.0",
 *     description="Dokumentasi API untuk pengelolaan data iPhone (CRUD)"
 * )
 */
class IphoneController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/register",
     *     summary="Registrasi User",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","email","password"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="password", type="string"),
     *             @OA\Property(property="password_confirmation", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Registrasi berhasil"
     *     )
     * )
     */
    public function register(Request $request)
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Login User",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="password", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Login berhasil"
     *     )
     * )
     */
    public function login(Request $request)
    {
        //
    }
    /**
     * @OA\Get(
     *     path="/api/iphones",
     *     summary="Ambil semua data iPhone",
     *     tags={"Iphones"},
     *     @OA\Response(
     *         response=200,
     *         description="Berhasil mengambil data"
     *     )
     * )
     */
    public function index()
    {
        return Iphone::all();
    }

    /**
     * @OA\Post(
     *     path="/api/iphones",
     *     summary="Tambah data iPhone",
     *     tags={"Iphones"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nama","storage","harga","stok"},
     *             @OA\Property(property="nama", type="string", example="iPhone 13"),
     *             @OA\Property(property="storage", type="string", example="128GB"),
     *             @OA\Property(property="harga", type="integer", example=12000000),
     *             @OA\Property(property="stok", type="integer", example=5)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Berhasil ditambahkan"),
     *     @OA\Response(response=403, description="Forbidden")
     * )
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $iphone = Iphone::create($request->all());
        return response()->json($iphone, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/iphones/{id}",
     *     summary="Detail iPhone",
     *     tags={"Iphones"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Berhasil")
     * )
     */
    public function show($id)
    {
        return Iphone::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/iphones/{id}",
     *     summary="Update data iPhone",
     *     tags={"Iphones"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nama", type="string"),
     *             @OA\Property(property="storage", type="string"),
     *             @OA\Property(property="harga", type="integer"),
     *             @OA\Property(property="stok", type="integer")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Berhasil diupdate"),
     *     @OA\Response(response=403, description="Forbidden")
     * )
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $iphone = Iphone::findOrFail($id);
        $iphone->update($request->all());

        return response()->json($iphone);
    }

    /**
     * @OA\Delete(
     *     path="/api/iphones/{id}",
     *     summary="Hapus data iPhone",
     *     tags={"Iphones"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Berhasil dihapus"),
     *     @OA\Response(response=403, description="Forbidden")
     * )
     */
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        Iphone::destroy($id);
        return response()->json(null, 204);
    }
}